<?php

function controller_user($act, $d) {
    if ($act == 'edit_window') return User::user_edit_window($d);
    if ($act == 'edit_update') throw new BadFunctionCallException('not implemented');//return User::User_edit_update($d);
    return '';
}
