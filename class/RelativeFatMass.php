<?php
// C2T5 PRACTICE 3
require_once "Person.php";

class RelativeFatMass extends Person
{
    private $rfmScore, $rfmCategory;

    public function countRFM()
    {
        $genderOperandValue = $this->gender == "m" ? 64 : 74;
        $this->rfmScore     = number_format($genderOperandValue - (20 * $this->height / $this->waistCircumference), 2);
        $this->setRFMCategory($this->rfmScore);
    }

    private function setRFMCategory($rfmScore)
    {
        $categories = [
            "Extremely low level of fat",
            "Essential fat",
            "Athletes",
            "Fitness",
            "Average",
            "Obese"
        ];

        switch ($this->gender) {
            case 'm':
                if ($rfmScore < 2) {
                    $this->rfmCategory = $categories[0];
                } elseif ($rfmScore >= 2 && $rfmScore < 6) {
                    $this->rfmCategory = $categories[1];
                } elseif ($rfmScore >= 6 && $rfmScore < 14) {
                    $this->rfmCategory = $categories[2];
                } elseif ($rfmScore >= 14 && $rfmScore < 18) {
                    $this->rfmCategory = $categories[3];
                } elseif ($rfmScore >= 18 && $rfmScore < 24) {
                    $this->rfmCategory = $categories[4];
                } else {
                    $this->rfmCategory = $categories[5];
                }
                break;
            default:
                if ($rfmScore < 10) {
                    $this->rfmCategory = $categories[0];
                } elseif ($rfmScore >= 10 && $rfmScore < 14) {
                    $this->rfmCategory = $categories[1];
                } elseif ($rfmScore >= 14 && $rfmScore < 21) {
                    $this->rfmCategory = $categories[2];
                } elseif ($rfmScore >= 21 && $rfmScore < 25) {
                    $this->rfmCategory = $categories[3];
                } elseif ($rfmScore >= 25 && $rfmScore < 32) {
                    $this->rfmCategory = $categories[4];
                } else {
                    $this->rfmCategory = $categories[5];
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
