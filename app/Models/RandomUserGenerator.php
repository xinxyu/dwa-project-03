<?php

namespace App\Models;

use Faker\Provider\cs_CZ\DateTime;
use Illuminate\Support\Facades\File;

class RandomUserGenerator
{
    protected $femaleNames;
    protected $maleNames;
    protected $lastNames;
    protected $emailDomains;
    protected $randomUsers;

    public function __construct()
    {
        // read in data files
        $fNameRaw = File::get(storage_path('data/female_names.txt'));
        $mNameRaw = File::get(storage_path('data/male_names.txt'));
        $lNameRaw = File::get(storage_path('data/last_names.txt'));
        $emailDomainsRaw = File::get(storage_path('data/email_domains.txt'));

        // parse data into arrays
        $this->femaleNames = explode("\n",$fNameRaw);
        $this->maleNames = explode("\n",$mNameRaw);
        $this->lastNames = explode("\n",$lNameRaw);
        $this->emailDomains = explode("\n",$emailDomainsRaw);
    }

    protected function generateNames($number, $gender){
        $users = [];


        for($i = 0; $i< $number;$i++) {

            $firstName = "";

            if($gender == "Male"){
                $firstName = $this->maleNames[array_rand($this->maleNames)];
                $genderResult = "Male";
            }
            else if($gender == "Female"){
                $firstName = $this->femaleNames[array_rand($this->femaleNames)];
                $genderResult = "Female";
            }
            else{
                $choice = rand(0,1);
                if($choice == 0){
                    $firstName = $this->maleNames[array_rand($this->maleNames)];
                    $genderResult = "Male";
                }
                else{
                    $firstName = $this->femaleNames[array_rand($this->femaleNames)];
                    $genderResult = "Female";
                }
            }

            $user = [
                "firstName" => $firstName,
                "lastName" => $this->lastNames[array_rand($this->lastNames)],
                "gender" => $genderResult
            ];
            array_push($users,$user);
        }

        $this->randomUsers = $users;
    }

    protected function generateEmails(){

        for($i = 0; $i < count($this->randomUsers); $i++){
            // create an email based on the first name and last name of the user
            $this->randomUsers[$i]["emailAddress"] = $this->randomUsers[$i]["firstName"]
                                                    . "."
                                                    . $this->randomUsers[$i]["lastName"]
                                                    . random_int(100,999)
                                                    . "@"
                                                    . $this->emailDomains[array_rand($this->emailDomains)];
        }

    }

    protected function generateBirthdays(){
        $currentYear = date('Y');

        for($i = 0; $i < count($this->randomUsers); $i++){
            $birthYear  = random_int($currentYear-60,$currentYear-18);
            $birthMonth = random_int(1,12);
            $birthDay   = random_int(1,28);

            $this->randomUsers[$i]["birthday"] = new \DateTime($birthYear."-".$birthMonth."-".$birthDay);
        }
    }

    protected function generatePhoneNumber(){
        for($i = 0; $i < count($this->randomUsers); $i++){
            $areaCode  = random_int(200,999);
            $centralOfficeCode = random_int(200,999);
            $subscriberNumber   = random_int(1000,9999);

            $this->randomUsers[$i]["phoneNumber"] = $areaCode. "-". $centralOfficeCode. "-".$subscriberNumber;
        }
    }

    public function generateUsers($number,$gender){

        $this->generateNames($number,$gender);
        $this->generatePhoneNumber();
        $this->generateEmails();
        $this->generateBirthdays();

        return $this->randomUsers;

    }

}
