# Motorsport (project_i4v2b_q8p2k_y6o6e)

## About

Motorsport is a web application modeling a database for a fictional racing game.

## Setup

The following steps assume that the public_html directory has already been setup with appropriate permissions.

Note: All commands should be executed from the home directory of the repository

### 1. Database setup

Log into SQL Plus and run the following command to initialze the database

```
start ./sql/start.sql
```  

### 2. Credentials setup

Add your Oracle credentials to [./src/server/config.php](./src/server/config.php)

### 3. Server setup

Run the following the following command to add the necessary .php files (with 711 permission) to the public_html directory.

CAUTION: Running the script will override any matching files in the public_html directory.

```
./scripts/setup_server.sh
```

If you are running the script for the first time you will also need to add exeucte permssions to the script.

```
chmod +x ./scripts/setup_server.sh
```

## Usage

The home page of the application can be accessed at httpx://www.students.cs.ubc.ca/~\<cwl\>/title.php


## FAQ

Running queries on the web application while connected to SQL Plus through the terminal will result in empty tables. Please disconnect from SQL Plus before using the web application.
