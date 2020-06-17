<?php

/**
 * this can be solved with sql query
 * the previous implementation had a lot of complications
 * i believe its better to run it as a query
 */

function getStatistics()
{
    $data = [];
    $data['users'] = [];

    // 65k rows
    
    $data['users'] = DB::raw(
        "Select t.user_id, concat(users.first_name, users.last_name) as name, 
        Sum(if(t.active_status = " . ActiveStatus::ACTIVE . ", 1, 0)) as valid,
        Sum(if(t.active_status = " . ActiveStatus::ACTIVE . ", t.cash, 0)) as cash,
        Sum(if(t.active_status = " . ActiveStatus::PENDING . ", 1, 0)) as pending,
        Sum(if(t.active_status = " . ActiveStatus::DELETED . ", 1, 0)) as invalid,
        count(t.id) as total
        From tariff_provider_tariff_match as t
        INNER JOIN users on users.id = t.user_id
        Group By t.user_id
    ");

    return $data;
}
