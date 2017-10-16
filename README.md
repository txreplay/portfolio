Portfolio | Personal website
=========

My personnal website ([txreplay.fr](https://txreplay.fr)). With an admin where all data is updatable. 

[![StackShare](https://img.shields.io/badge/tech-stack-0690fa.svg?style=flat)](https://stackshare.io/TxReplay/portfolio)


## Installation

### Step 1: Download the project 

```bash
git clone git@github.com:TxReplay/portfolio.git && cd portfolio
```

### Step 2: Install bundles using composer 

```bash
composer install
```

### Step3: Install assets using Bower
```bash
bower install
```

### Step 4: Create and update the database
```bash
bin/console doctrine:database:create
```

```bash
bin/console doctrine:schema:update --force
```
