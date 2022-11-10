<?php
    require_once "Person.php";

    class RelativeFatMass extends Person
    {
        private $rfmScore, $rfmCategory;

        public function countRFM()
        {
            $genderOperandValue = $this->gender == "m" ? 64 : 76;
            $this->rfmScore     = number_format($genderOperandValue - (20 * $this->height / $this->waistCircumference), 2);
            $this->setRFMCategory($this->rfmScore);
        }

        private function setRFMCategory($rfmScore)
        {

            switch ($this->gender) {
                case 'm':
                    if ($rfmScore < 2) {
                        $this->rfmCategory = "1";
                    }
                    
                    if ($rfmScore >= 24) {
                        $this->rfmCategory = "6";
                    }

                    if ($rfmScore >= 2 && $rfmScore < 6) {
                        $this->rfmCategory = "2";
                    } elseif ($rfmScore >= 6 && $rfmScore < 14) {
                        $this->rfmCategory = "3";
                    } elseif ($rfmScore >= 14 && $rfmScore < 18) {
                        $this->rfmCategory = "4";
                    } else {
                        $this->rfmCategory = "5";
                    }
                    break;
                default:
                    if ($rfmScore < 10) {
                        $this->rfmCategory = "1";
                    }
                    
                    if ($rfmScore >= 32) {
                        $this->rfmCategory = "6";
                    }

                    if ($rfmScore >= 10 && $rfmScore < 14) {
                        $this->rfmCategory = "2";
                    } elseif ($rfmScore >= 14 && $rfmScore < 21) {
                        $this->rfmCategory = "3";
                    } elseif ($rfmScore >= 21 && $rfmScore < 25) {
                        $this->rfmCategory = "4";
                    } else {
                        $this->rfmCategory = "5";
                    }
                    break;
            }

        }
        
        public function getRFMScore()
        {
            return $this->rfmScore;
        }

        public function getRFMCategory()
        {
            return $this->rfmCategory;
        }
    }
