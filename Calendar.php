<?php

/**
<!-- Assignment 3-->
<!-- Written by: Thong Minh Tran  -  ID: 40072745-->
<!-- For SOEN 287 Section Q – Fall 2020-->
<!--------------------------------------------------------------------------------->
 * This class is to store data we want to display at select dropdown for day of birth, year of birth, month of birth
 * Class Calendar
 *
 */
class Calendar
{
    public $months;
    public $years;
    public $days;

    public function __construct()
    {
        // Set up 12 months
        $this->months = ['January','February', 'March', 'April', 'May', 'June', 'July', 'August', 'September',
            'October', 'November', 'December'];
        // set up birthday's year
        for($i = 1970; $i < 2020; $i++) {
            $this->years[] = $i;
        }
        // set up days
        for ($i = 1; $i <= 31; $i++) {
            $this->days[] = $i;
        }
    }
}