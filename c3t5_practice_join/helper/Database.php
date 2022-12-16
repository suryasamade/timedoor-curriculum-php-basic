<?php
    class Database
    {
        public PDO $connection;

        public function __construct(PDO $connection)
        {
            $this->connection = $connection;    
        }

        public function selectAll(string $table, array $columns = ['*']): array
        {
            $columns = implode(",", $columns);
            $query = "SELECT {$columns} FROM {$table};";
            $query = $this->connection->query($query);
            
            return $query->fetchAll();
        }

        public function selectSpecified(string $table, string $whereColumn = 'id', string $operator = '=', $condition = '1', array $columns = ['*']): ?array
        {
            $columns = implode(",", $columns); 
            $query = "SELECT {$columns} FROM {$table} WHERE {$whereColumn} {$operator} ?;";

            $query = $this->connection->prepare($query);
            $query->execute([$condition]);

            return $query->fetch() ?: null;
        }

        public function insert(string $table, array $columns, array $values): bool
        {
            if (count($columns) != count($values)) {
                return false;
            }
            
            $vals = [];
            for ($i = 0; $i < count($values); $i++) {
                $vals[] = "?";
            }

            $columns = implode(",", $columns);
            $vals = implode(",", $vals);
            $query = "INSERT INTO {$table} ({$columns}) VALUES ({$vals});";
            
            $query = $this->connection->prepare($query);
            
            return $query->execute($values);
        }

        public function update(string $table, array $columns, array $values, string $whereColumn = 'id', string $operator = '=', $condition = '1'): bool
        {
            $cols = [];
            for ($i = 0; $i < count($columns); $i++) {
                $cols[] = "{$columns[$i]}=?";
            }

            $cols = implode(",", $cols);

            $query = "UPDATE {$table} SET {$cols} WHERE {$whereColumn} {$operator} ?;";
            $values[] = $condition;

            $query = $this->connection->prepare($query);

            return $query->execute($values);
        }

        public function delete(string $table, string $whereColumn = 'id', string $operator = '=', $condition = '1'): bool
        {
            $query = "DELETE FROM {$table} WHERE {$whereColumn} {$operator} ?;";
            $query = $this->connection->prepare($query);

            return $query->execute([$condition]);
        }
    }
?>