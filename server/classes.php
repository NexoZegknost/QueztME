<?php
class STUDENT
{
    public $uid, $fullname, $username, $email, $icode, $mcode, $year, $phone, $classname;

    public function __construct(
        $uid,
        $fullname,
        $username,
        $email,
        $icode,
        $mcode,
        $year,
        $phone,
        $classname
    ) {
        $this->uid = $uid;
        $this->fullname = $fullname;
        $this->username = $username;
        $this->email = $email;
        $this->icode = $icode;
        $this->mcode = $mcode;
        $this->year = $year;
        $this->phone = $phone;
        $this->classname = $classname;
    }
}
