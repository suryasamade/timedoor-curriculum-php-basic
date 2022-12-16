<?php
    class Pagination
    {
        protected int $totalRecord;
        protected int $recordsPerPage; // limit
        protected int $totalPage;
        protected int $currentPage; // active page
        protected int $offset;

        public function __construct(int $totalRecord, int $recordsPerPage, int $currentPage)
        {
            $this->totalRecord = $totalRecord;
            
            $this->recordsPerPage = $recordsPerPage;
            
            $this->totalPage = ceil($totalRecord / $recordsPerPage);
            
            $currentPage = max($currentPage, 1);
            $currentPage = min($currentPage, $this->totalPage);
            $this->currentPage = $currentPage;

            $this->offset = ($this->currentPage * $recordsPerPage) - $recordsPerPage;
        }

        public function getCurrentPage(): int
        {
            return $this->currentPage;
        }

        public function getPages(): array
        {
            return range(1, $this->totalPage);
        }

        public function getOffset(): int
        {
            return $this->offset;
        }
    }
?>