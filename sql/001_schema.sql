-- ============================================================
-- Headstone Tributes - PostgreSQL DDL Schema
-- Converted from MySQL; originally used with PDO
-- ============================================================

-- Drop tables in reverse dependency order (if re-running)
DROP TABLE IF EXISTS filt_dec CASCADE;
DROP TABLE IF EXISTS tributes CASCADE;
DROP TABLE IF EXISTS login CASCADE;
DROP TABLE IF EXISTS deceased CASCADE;
DROP TABLE IF EXISTS cemeteries CASCADE;
DROP TABLE IF EXISTS countries CASCADE;
DROP TABLE IF EXISTS users CASCADE;

-- -----------------------------------------------------------
-- 1. users
-- -----------------------------------------------------------
CREATE TABLE users (
    user_id    SERIAL       PRIMARY KEY,
    user_name  VARCHAR(100) NOT NULL UNIQUE,
    first_name VARCHAR(100) NOT NULL,
    last_name  VARCHAR(100) NOT NULL,
    email      VARCHAR(255) NOT NULL
);

-- -----------------------------------------------------------
-- 2. login  (1-to-1 with users)
-- -----------------------------------------------------------
CREATE TABLE login (
    user_id  INT PRIMARY KEY REFERENCES users(user_id) ON DELETE CASCADE,
    pw       VARCHAR(255) NOT NULL,
    comments TEXT
);

-- -----------------------------------------------------------
-- 3. countries
-- -----------------------------------------------------------
CREATE TABLE countries (
    con_id  SERIAL       PRIMARY KEY,
    country VARCHAR(150) NOT NULL
);

-- -----------------------------------------------------------
-- 4. cemeteries
-- -----------------------------------------------------------
CREATE TABLE cemeteries (
    cem_id       SERIAL       PRIMARY KEY,
    con_id       INT          NOT NULL REFERENCES countries(con_id) ON DELETE RESTRICT,
    cem_name     VARCHAR(255) NOT NULL,
    cem_city     VARCHAR(255) NOT NULL,
    cem_comments TEXT
);

-- -----------------------------------------------------------
-- 5. deceased
-- -----------------------------------------------------------
CREATE TABLE deceased (
    dec_id       SERIAL       PRIMARY KEY,
    user_id      INT          NOT NULL REFERENCES users(user_id) ON DELETE CASCADE,
    cem_id       INT          REFERENCES cemeteries(cem_id) ON DELETE SET NULL,
    d_last_name  VARCHAR(150) NOT NULL,
    d_first_name VARCHAR(150) NOT NULL,
    d_mi         VARCHAR(10),
    dt_born      DATE,
    dt_passed    DATE,
    obit         TEXT,
    comments     TEXT
);

-- -----------------------------------------------------------
-- 6. tributes
-- -----------------------------------------------------------
CREATE TABLE tributes (
    id      SERIAL PRIMARY KEY,
    dec_id  INT    NOT NULL REFERENCES deceased(dec_id) ON DELETE CASCADE,
    user_id INT    NOT NULL REFERENCES users(user_id) ON DELETE CASCADE,
    tribute TEXT   NOT NULL,
    dt_post DATE   DEFAULT CURRENT_DATE
);

-- -----------------------------------------------------------
-- 7. filt_dec  (denormalized search table)
-- -----------------------------------------------------------
CREATE TABLE filt_dec (
    dec_id       INT          REFERENCES deceased(dec_id) ON DELETE CASCADE,
    user_id      INT          REFERENCES users(user_id) ON DELETE CASCADE,
    cem_id       INT          REFERENCES cemeteries(cem_id) ON DELETE SET NULL,
    d_last_name  VARCHAR(150),
    d_first_name VARCHAR(150),
    d_mi         VARCHAR(10),
    dt_born      DATE,
    dt_passed    DATE,
    obit         TEXT,
    comments     TEXT,
    str2search   TEXT,
    cem_name     VARCHAR(255),
    cem_city     VARCHAR(255),
    country      VARCHAR(150),
    cem_comments TEXT
);

-- Index for the search column
CREATE INDEX idx_filt_dec_str2search ON filt_dec (str2search);
CREATE INDEX idx_filt_dec_dec_id     ON filt_dec (dec_id);

-- Useful indexes
CREATE INDEX idx_deceased_user_id  ON deceased (user_id);
CREATE INDEX idx_deceased_cem_id   ON deceased (cem_id);
CREATE INDEX idx_tributes_dec_id   ON tributes (dec_id);
CREATE INDEX idx_tributes_user_id  ON tributes (user_id);
CREATE INDEX idx_cemeteries_con_id ON cemeteries (con_id);
