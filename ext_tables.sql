CREATE TABLE tx_recipes_domain_model_recipe
(
    name               VARCHAR(150)        NOT NULL DEFAULT '',
    slug               VARCHAR(200)        NOT NULL DEFAULT '',
    description        TEXT                NOT NULL,
    meta_title         VARCHAR(150)        NOT NULL,
    meta_description   VARCHAR(250)        NOT NULL,
    meta_keywords      VARCHAR(250)        NOT NULL,
    images             INT(11) UNSIGNED    NOT NULL DEFAULT 0,
    difficulty         TINYINT(1)          NOT NULL,
    preparation_time   TIME                         DEFAULT '00:00:00',
    cooking_time       TIME                         DEFAULT '00:00:00',
    total_time         TIME                         DEFAULT '00:00:00',
    components         INT(11) UNSIGNED    NOT NULL DEFAULT 0,
    portions           TINYINT(2) UNSIGNED NOT NULL,
    preparation        TEXT                NOT NULL,
    steps              INT(11) UNSIGNED    NOT NULL DEFAULT 0,
    nutritional_values INT(11) UNSIGNED    NOT NULL DEFAULT 0,
    tags               INT(11) UNSIGNED    NOT NULL DEFAULT 0,
    categories         INT(11) UNSIGNED    NOT NULL DEFAULT 0
);

CREATE TABLE tx_recipes_domain_model_preparationstep
(
    sorting     INT(11)          NOT NULL DEFAULT 0,
    recipe      INT(11) UNSIGNED NOT NULL DEFAULT 0,
    name        VARCHAR(150)     NOT NULL,
    description TEXT             NOT NULL,
    image       INT(11)          NOT NULL DEFAULT 0
);

CREATE TABLE tx_recipes_domain_model_component
(
    sorting     INT(11)          NOT NULL DEFAULT 0,
    recipe      INT(11) UNSIGNED NOT NULL DEFAULT 0,
    name        VARCHAR(150)     NOT NULL DEFAULT '',
    ingredients INT(11)          NOT NULL DEFAULT 0
);

CREATE TABLE tx_recipes_domain_model_ingredient
(
    sorting   INT(11)                NOT NULL DEFAULT 0,
    component INT(11) UNSIGNED       NOT NULL DEFAULT 0,
    type      VARCHAR(200)           NOT NULL,
    unit      VARCHAR(50)            NOT NULL,
    amount    DECIMAL(5, 2) UNSIGNED NULL
);

CREATE TABLE tx_recipes_domain_model_nutritionalvalue
(
    recipe        INT(11) UNSIGNED       NOT NULL DEFAULT 0,
    nutrient      VARCHAR(200)           NOT NULL,
    is_subsidiary TINYINT(1)             NOT NULL,
    unit          VARCHAR(50)            NOT NULL,
    amount        DECIMAL(5, 2) UNSIGNED NOT NULL
);

CREATE TABLE tx_recipes_domain_model_tag
(
    name VARCHAR(100) NOT NULL,
    slug VARCHAR(200) NOT NULL DEFAULT ''
);

CREATE TABLE tx_recipes_domain_model_recipe_2_tag
(
    uid_local   INT(10) UNSIGNED NOT NULL DEFAULT 0,
    uid_foreign INT(10) UNSIGNED NOT NULL DEFAULT 0,
    sorting     INT(11)          NOT NULL DEFAULT 0
);
