-- ============================================================
-- Headstone Tributes - Sample / Seed Data
-- ============================================================

-- -----------------------------------------------------------
-- Countries
-- -----------------------------------------------------------
INSERT INTO countries (country) VALUES
    ('United States'),
    ('Canada'),
    ('United Kingdom'),
    ('Jamaica'),
    ('Trinidad and Tobago'),
    ('Australia');

-- -----------------------------------------------------------
-- Users
-- -----------------------------------------------------------
INSERT INTO users (user_name, first_name, last_name, email) VALUES
    ('jdoe',      'John',    'Doe',      'john.doe@example.com'),
    ('msmith',    'Maria',   'Smith',    'maria.smith@example.com'),
    ('bwilliams', 'Brian',   'Williams', 'brian.williams@example.com'),
    ('ajohnson',  'Angela',  'Johnson',  'angela.johnson@example.com'),
    ('tking',     'Trevor',  'King',     'trevor.king@example.com');

-- -----------------------------------------------------------
-- Login (passwords stored as plaintext, matching app behavior)
-- -----------------------------------------------------------
INSERT INTO login (user_id, pw, comments) VALUES
    (1, 'password1', 'Admin user'),
    (2, 'password2', NULL),
    (3, 'password3', NULL),
    (4, 'password4', NULL),
    (5, 'password5', NULL);

-- -----------------------------------------------------------
-- Cemeteries
-- -----------------------------------------------------------
INSERT INTO cemeteries (con_id, cem_name, cem_city, cem_comments) VALUES
    (1, 'Greenwood Memorial Park',     'San Diego',    'Established 1907'),
    (1, 'Arlington National Cemetery',  'Arlington',    'National military cemetery'),
    (2, 'Mount Pleasant Cemetery',      'Toronto',      'Historic garden cemetery'),
    (3, 'Highgate Cemetery',            'London',       'Victorian era, Grade I listed'),
    (4, 'Dovecot Memorial Park',        'Kingston',     NULL),
    (1, 'Woodlawn Cemetery',            'New York',     'National Historic Landmark');

-- -----------------------------------------------------------
-- Deceased
-- -----------------------------------------------------------
INSERT INTO deceased (user_id, cem_id, d_last_name, d_first_name, d_mi, dt_born, dt_passed, obit, comments) VALUES
    (1, 1, 'Doe',      'Robert',   'A', '1942-03-15', '2020-11-02',
     'Robert A. Doe, loving father and grandfather, passed away peacefully on November 2, 2020. He served in the US Army and was a dedicated school teacher for 35 years. He is survived by his wife Mary, sons John and James, and four grandchildren.',
     'Beloved patriarch of the Doe family'),

    (1, NULL, 'Doe',   'Mary',     'L', '1945-07-22', '2023-01-18',
     'Mary L. Doe, devoted wife and mother, went home to be with the Lord on January 18, 2023. She was a pillar of her community, volunteering at the local library and church for decades.',
     'Joined her husband Robert'),

    (2, 2, 'Smith',    'James',    'T', '1920-12-01', '1995-06-15',
     'Sergeant James T. Smith served with honor in World War II. A Bronze Star recipient, he returned home to build a life of service. He worked at the VA hospital for 30 years, helping fellow veterans.',
     'WWII veteran, Bronze Star recipient'),

    (3, 3, 'Williams', 'Eleanor',  'M', '1960-09-10', '2022-04-30',
     'Eleanor M. Williams was a beloved professor of English Literature at the University of Toronto. Her passion for the written word inspired thousands of students over her 28-year career.',
     NULL),

    (4, 4, 'Brown',    'Charles',  'W', '1935-01-28', '2019-08-12',
     'Charles W. Brown, OBE, was a distinguished civil servant who dedicated his life to public service in London. He was instrumental in establishing community centres across East London.',
     'Order of the British Empire recipient'),

    (3, 5, 'Campbell', 'Hyacinth', NULL, '1950-05-05', '2021-12-25',
     'Hyacinth Campbell was the heart and soul of her community in Kingston. A talented cook and seamstress, she raised five children and was known for her generosity and warm spirit.',
     'Forever in our hearts'),

    (5, 6, 'King',     'Samuel',   'R', '1955-11-11', '2024-02-14',
     'Samuel R. King was a jazz musician who performed at legendary venues across New York City. His saxophone melodies brought joy to countless audiences over a 40-year career.',
     'The music lives on'),

    (2, 1, 'Garcia',   'Rosa',     'M', '1938-04-20', '2018-10-05',
     'Rosa M. Garcia immigrated from Mexico in 1962 and built a thriving bakery in San Diego. She was known for her famous conchas and her unwavering dedication to family.',
     'Founder of Rosa''s Bakery');

-- -----------------------------------------------------------
-- Tributes
-- -----------------------------------------------------------
INSERT INTO tributes (dec_id, user_id, tribute, dt_post) VALUES
    (1, 2, 'Uncle Robert was always the life of every family gathering. His stories about teaching kept us laughing for hours. Rest in peace.', '2020-11-10'),
    (1, 3, 'Mr. Doe was my favorite teacher in high school. He made history come alive. The world lost a great educator.', '2020-11-15'),
    (1, 4, 'Robert was a wonderful neighbor for over 20 years. We will miss his kindness and his beautiful garden.', '2020-12-01'),
    (3, 4, 'Grandpa James was a true hero. His sacrifice and service will never be forgotten. We carry his legacy forward.', '1995-07-01'),
    (3, 1, 'Sergeant Smith trained my father. He was a man of incredible integrity and courage.', '1995-08-20'),
    (4, 5, 'Professor Williams changed my life. Her Shakespeare seminar opened my eyes to the beauty of literature.', '2022-05-15'),
    (4, 1, 'A brilliant mind and a warm heart. Eleanor will be deeply missed by the academic community.', '2022-05-20'),
    (5, 2, 'Mr. Brown''s community centres gave so many young people a safe place to grow. His legacy lives on in every life he touched.', '2019-09-01'),
    (6, 4, 'Auntie Hyacinth''s Sunday dinners were legendary. Her jerk chicken recipe will be passed down for generations.', '2022-01-05'),
    (7, 1, 'Sam''s music was pure magic. I''ll never forget the night he played at the Blue Note. A true artist.', '2024-03-01'),
    (7, 3, 'Samuel King taught me everything I know about jazz. His spirit lives on in every note I play.', '2024-03-10'),
    (8, 5, 'Rosa''s bakery was a community treasure. Her conchas were the best I''ve ever had. Descanse en paz.', '2018-11-01'),
    (2, 4, 'Mrs. Doe was the sweetest soul. She always had a kind word and a warm smile for everyone.', '2023-02-01');

-- -----------------------------------------------------------
-- filt_dec (denormalized search data - populated from joins)
-- -----------------------------------------------------------
INSERT INTO filt_dec (dec_id, user_id, cem_id, d_last_name, d_first_name, d_mi, dt_born, dt_passed, obit, comments, str2search, cem_name, cem_city, country, cem_comments)
SELECT
    d.dec_id,
    d.user_id,
    d.cem_id,
    d.d_last_name,
    d.d_first_name,
    d.d_mi,
    d.dt_born,
    d.dt_passed,
    d.obit,
    d.comments,
    LOWER(
        COALESCE(d.d_first_name, '') || ' ' ||
        COALESCE(d.d_last_name, '')  || ' ' ||
        COALESCE(d.d_mi, '')         || ' ' ||
        COALESCE(c.cem_name, '')     || ' ' ||
        COALESCE(c.cem_city, '')     || ' ' ||
        COALESCE(co.country, '')     || ' ' ||
        COALESCE(d.obit, '')
    ) AS str2search,
    c.cem_name,
    c.cem_city,
    co.country,
    c.cem_comments
FROM deceased d
LEFT JOIN cemeteries c  ON d.cem_id = c.cem_id
LEFT JOIN countries  co ON c.con_id = co.con_id;
