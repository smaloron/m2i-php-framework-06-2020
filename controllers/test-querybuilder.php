<?php

$query = new QueryBuilder();

$query->select("user_name")
    ->from("users")
    ->where(["user_email=?", "user_password=?"]);

// SELECT user_name FROM users WHERE user_email=? AND user_password=?
echo $query->getSQL();