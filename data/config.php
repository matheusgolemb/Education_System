<?php
    $baseName = "http://localhost/php_course/Class_07/EducationSystem/";
    session_start();

    function readFileMat($fileName){ //return back an associate array
        $file = fopen($fileName,'r');
        $dataArray = json_decode(fread($file,filesize($fileName)),true);
        fclose($file);
        return $dataArray;
    }
    function writeInFile($fileName, $newData){  //write in file new data
        $file = fopen($fileName, 'w');
        fwrite($file, json_encode($newData));
        fclose($file);
    }
    function checkLogin($userArray, $role, $email, $pass){ //check pass and email. If correct, redirect to $role page. If incorrect redirect to index
        $baseName = "http://localhost/php_course/Class_07/EducationSystem/";
        foreach($userArray as $user){
            if($user['email']==$email && $user['pass']==$pass){
                switch ($role) {
                    case 'tech':
                        $user['logHome'] = $baseName.'teacherHome.php';
                        $_SESSION['logUser'] = $user;
                        header("Location: ".$baseName.'teacherHome.php');
                        exit();
                        break;
                    case 'st':
                        $user['logHome'] = $baseName.'profile.php';
                        $_SESSION['logUser'] = $user;
                        header("Location: ".$baseName.'profile.php');
                        exit();
                        break;
                    case 'admin':
                        $user['logHome'] = $baseName.'adminHome.php';
                        $_SESSION['logUser'] = $user;
                        header("Location: ".$baseName.'adminHome.php');
                        exit();
                        break;
                }
            }
        }
        header("Location: ".$baseName.'index.php?msg=1');
        exit();
    }

    function valExists($associatedArray, $searchVal){ //Works like .get in JS Maps. Search the value and return only the value and key of the array back
        foreach($associatedArray as $idx=>$item){
        foreach($item as $key=>$props){
            if($searchVal==$props){
                return [$key=>$props];
            }
        }
        }
        return 0;  //0 means false
    }
    function getFullArray($associatedArray, $searchVal){ //Works like .get in JS Maps. Search the value and return value back
        foreach($associatedArray as $idx=>$item){
        foreach($item as $key=>$props){
            if($searchVal==$props){
                return $item;
            }
        }
        }
        return 0;  //0 means false
    }
    function getValbyKey($associatedArray, $searchKey){ //Works like .get in JS Maps. Search the key and return value back
        foreach($associatedArray as $idx=>$item){
            foreach($item as $key=>$props){
                if($searchKey==$key){
                    return [$key=>$props];
                }
            }
        }
        return 0;  //0 means false
    }
    function setValArray($associatedArray, $replaceKey, $replaceVal){ //Works like .set in JS Maps
        foreach($associatedArray as $idx=>$item){
        foreach($item as $key=>$props){
            if($replaceKey==$key){
                $associatedArray[$idx][$key] = $replaceVal;
                return $associatedArray;
            }
        }
        }
        return 0; //0 means false
    }
    
    
    // DOWN HERE WAS JUST TESTS TO SEE IF FUNCTION WAS CORRECT

    // $teste = [["stID"=>"1001039","mark"=>0],["stID"=>"1001001","mark"=>0]];
    
    // $newArr = setValArray($teste, "marko", 10);
    // print_r($teste);
    // echo "<hr>";
    // print_r($newArr);
    // echo "<hr>";
?>