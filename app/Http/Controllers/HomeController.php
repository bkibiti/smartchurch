<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Person;
use App\Kanda;
use App\Community;
use App\Service;
use Carbon\Carbon;
USE DB;

class HomeController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {
        $personCount = Person::groupBy('gender')->selectRaw('gender,count(*) as count')->orderBy('gender')->get();
        // $groupCount = Service::count();
        // $kanda = Kanda::count();
        // $community = Community::count();
        $data[0]= Service::count(); //vyama vya kitume
        $data[1]= Kanda::count();
        $data[2]= Community::count(); //Jumuiya

 
     
        $members = DB::select("SELECT k.name kanda,
                    SUM(IF(gender ='Me',1,0)) as 'Male',
                    SUM(IF(gender ='Ke',1,0)) as 'Female'
                    FROM persons
                    JOIN ou_kanda k ON k.id = persons.kanda_id GROUP BY kanda order by Kanda");
       
        $ageCategory = DB::select("SELECT gender,
            SUM(IF(TIMESTAMPDIFF(YEAR, dob, CURDATE()) < 10,1,0)) as '0 - 9',
            SUM(IF(TIMESTAMPDIFF(YEAR, dob, CURDATE()) BETWEEN 10 and 19,1,0)) as '10 - 19',
            SUM(IF(TIMESTAMPDIFF(YEAR, dob, CURDATE()) BETWEEN 20 and 29,1,0)) as '20 - 29',
            SUM(IF(TIMESTAMPDIFF(YEAR, dob, CURDATE()) BETWEEN 30 and 39,1,0)) as '30 - 39',
            SUM(IF(TIMESTAMPDIFF(YEAR, dob, CURDATE()) BETWEEN 40 and 49,1,0)) as '40 - 49',
            SUM(IF(TIMESTAMPDIFF(YEAR, dob, CURDATE()) BETWEEN 50 and 59,1,0)) as '50 - 59',
            SUM(IF(TIMESTAMPDIFF(YEAR, dob, CURDATE()) BETWEEN 60 and 69,1,0)) as '60 - 69',
            SUM(IF(TIMESTAMPDIFF(YEAR, dob, CURDATE()) BETWEEN 70 and 79,1,0)) as '70 - 79',
            SUM(IF(TIMESTAMPDIFF(YEAR, dob, CURDATE()) >=80, 1, 0)) as '80 - 99'
            FROM persons group by gender order by gender");

        $pledges = DB::select("SELECT f.name activity,sum(amount) amount
                    FROM pledges
                    JOIN fund_activities f ON f.id = pledges.activity_id
                    where year(pledge_date) = year(now())
                    group by activity,year(pledge_date)");
        $payment = DB::select("SELECT f.name activity,sum(amount) amount
                    FROM payments
                    JOIN fund_activities f ON f.id = payments.activity_id
                    where year(pay_date) = year(now())
                    group by activity");
       $paytrend = DB::select("SELECT year(pay_date) year,month(pay_date) month,DATE_FORMAT(pay_date, '%b-%y') monthname, sum(amount) amount 
                    FROM payments 
                    group by year,month,monthname
                    order by year desc,month desc limit 12");
        return view('dashboard',compact("personCount","data","ageCategory","members","pledges","payment","paytrend"));
    }
}
