<?php


use Illuminate\Foundation\Testing\DatabaseTransactions;

/**
 * Created by PhpStorm.
 * User: piscouser
 * Date: 16/01/2017
 * Time: 12:52 AM
 */
class FeaturesTestCase extends TestCase
{
    use DatabaseTransactions;

    public function seeErrors(array $fields){

        foreach ($fields as $name => $errors){
            foreach ((array) $errors as $message){
                $this->seeInElement(
                  "#field_{$name}.has-error .help-block",$message
                );
                
            }    
        }
        
    }

}