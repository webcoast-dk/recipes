CREATE TABLE tx_recipes_domain_model_recipe
(
    name               varchar(150)        not null default '',
    description        text                not null,
    images             int(11) unsigned    not null default 0,
    difficulty         tinyint(1)          not null,
    preparation_time   time                         default '00:00:00',
    cooking_time       time                         default '00:00:00',
    total_time         time                         default '00:00:00',
    components         int(11) unsigned    not null default 0,
    portions           tinyint(2) unsigned not null,
    preparation        text                not null,
    steps              int(11) unsigned    not null default 0,
    nutritional_values int(11) unsigned    not null default 0,
    tags               int(11) unsigned    not null default 0,
    categories         int(11) unsigned    not null default 0
);

CREATE TABLE tx_recipes_domain_model_preparationstep
(
    sorting     int(11)          not null default 0,
    recipe      int(11) unsigned not null default 0,
    name        varchar(150)     not null,
    description text             not null,
    image       int(11)          not null default 0
);

CREATE TABLE tx_recipes_domain_model_component
(
    sorting     int(11)          not null default 0,
    recipe      int(11) unsigned not null default 0,
    name        varchar(150)     not null default '',
    ingredients int(11)          not null default 0
);

CREATE TABLE tx_recipes_domain_model_ingredient
(
    sorting   int(11)                not null default 0,
    component int(11) unsigned       not null default 0,
    type      varchar(200)           not null,
    unit      varchar(50)            not null,
    amount    decimal(5, 2) unsigned null
);

CREATE TABLE tx_recipes_domain_model_nutritionalvalue
(
    recipe        int(11) unsigned       not null default 0,
    nutrient      varchar(200)           not null,
    is_subsidiary tinyint(1)             not null,
    unit          varchar(50)            not null,
    amount        decimal(5, 2) unsigned not null
);

CREATE TABLE tx_recipes_domain_model_tag
(
    name varchar(100) not null,
    slug varchar(200) not null default ''
);

CREATE TABLE tx_recipes_domain_model_recipe_2_tag
(
    uid_local   int(10) unsigned not null default 0,
    uid_foreign int(10) unsigned not null default 0,
    sorting     int(11)          not null default 0
);
