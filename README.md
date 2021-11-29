
Requirements:

- PHP 5.3


## Directory Structure

| Subdirectory | Contents                              |
|--------------|---------------------------------------|
|`public`      | All files the user can reach directly |
|`src`         | Includes                              |
|`sql`         | SQL dump files                        |
|`config`      | MySQL connection secrets              |


## Where to look first

- `public/index.php`
    - The page with the table
- `public/votes.php`
    - JSON data route that accepts URL queries like `/votes.php?color=Red`
- `src/votes.php`
    - validate and run the above query


<!-- Use the W3 validator! html / css / javascript -->