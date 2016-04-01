<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


/**
 * Description of Uploader
 *
 * @author MUsama
 */

class Uploader {
    
    public  $pathToFile;
    public  $isSucessfull;
    
    public function upload($name,$type,$fredirect,$sredirect,$directory) {
      // getting all of the post data
      $file = array($name => Input::file($name));
      // setting up rules
      
      $rules = array($name => 'required',
          
          );
      if($type=='image'){
          array_push($rules, "$name => 'mimes:jpeg,bmp,png'") ;
      }
    //mimes:jpeg,bmp,png and for max size max:10000
      // doing the validation, passing post data, rules and the messages
      $validator = Validator::make($file, $rules);
      if ($validator->fails()) {
        // send back to the page with the input data and errors
          $this->isSucessfull=0;
          return $fredirect->withInput()->withErrors($validator);
      }
      else {
        // checking file is valid.
        if (Input::file($name)->isValid()) {
          $destinationPath = "uploads/$directory"; // upload path
          $extension = Input::file($name)->getClientOriginalExtension(); // getting image extension
          $fileName = $name.rand(1,99999).'.'.$extension; // renameing image
          Input::file($name)->move($destinationPath, $fileName); // uploading file to given path
          // sending back with message
          
          Session::flash('success', 'Upload successfully'); 
           
          $this->isSucessfull=1;
          $this->pathToFile = $destinationPath."/".$fileName;
          return $sredirect;
          
        }
        else {
          // sending back with error message.
          Session::flash('error', 'uploaded file is not valid');
          $this->isSucessfull=0;
          return $fredirect;
          
        }
      }
    }    
    
    public function isFail(){
        return !$this->isSucessfull;
    }
    public function isSucessfull(){
        return $this->isSucessfull;
    }
    
}
