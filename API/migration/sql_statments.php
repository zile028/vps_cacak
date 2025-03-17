<?php
$migrate_media = "
CREATE TABLE `media` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fileName` varchar(255) NOT NULL,
  `storeName` varchar(255) NOT NULL,
  `type` varchar(50) DEFAULT NULL,
  `size` float DEFAULT NULL,
  `createdAt` timestamp NOT NULL DEFAULT current_timestamp(),
  `lang` varchar(5) DEFAULT 'srb',
  `mimetype` varchar(255) NOT NULL,
  `oldID` int(10) DEFAULT NULL,
  PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
INSERT INTO media (id, fileName, storeName, type, createdAt, mimetype)
SELECT wp.ID, wp.post_title, wp.guid, SUBSTRING_INDEX(wp.guid, '.', -1) as type, wp.post_date, wp.post_mime_type
FROM wp3k_posts wp
WHERE wp.post_mime_type IS NOT NULL
  AND wp.post_mime_type != '';
";
$migrate_vesti = "
CREATE TABLE `vesti` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `naslov` text NOT NULL,
  `description` longtext NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT 1,
  `featured_imageID` varchar(10) DEFAULT NULL,
  `lang` varchar(5) NOT NULL DEFAULT 'srb',
  `createdAt` timestamp NOT NULL DEFAULT current_timestamp(),
  `updatedAt` timestamp NULL DEFAULT NULL,
  `userID` int(10) NOT NULL,
  `translate_relation` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`translate_relation`)),
  PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
INSERT INTO vesti (id, naslov, description, featured_imageID, createdAt, updatedAt, userID, lang)
SELECT wpp.id                                  AS id,
       wpp.post_title                          AS naslov,
       wpp.post_content                        AS description,
       (SELECT meta_value
        FROM wp3k_postmeta wppm
        WHERE wppm.post_id = wpp.ID
          AND wppm.meta_key = '_thumbnail_id') AS featured_imageID,
       wpp.post_date                           AS createdAt,
       wpp.post_modified                       as updatedAt,
       wpp.post_author                         AS userID,
       'srb'                                   as lang
FROM wp3k_posts wpp
         JOIN wp3k_term_relationships wptr ON wptr.object_id = wpp.ID
         JOIN wp3k_term_taxonomy wptt ON wptt.term_taxonomy_id = wptr.term_taxonomy_id
         JOIN wp3k_terms wpt ON wpt.term_id = wptt.term_id
WHERE wpt.slug = 'aktuelnosti';
INSERT INTO vesti (id, naslov, description, featured_imageID, createdAt, updatedAt, userID, lang)
SELECT wpp.id                                  AS id,
       wpp.post_title                          AS naslov,
       wpp.post_content                        AS description,
       (SELECT meta_value
        FROM wp3k_postmeta wppm
        WHERE wppm.post_id = wpp.ID
          AND wppm.meta_key = '_thumbnail_id') AS featured_imageID,
       wpp.post_date                           AS createdAt,
       wpp.post_modified                       as updatedAt,
       wpp.post_author                         AS userID,
       'en'                                   as lang
FROM wp3k_posts wpp
         JOIN wp3k_term_relationships wptr ON wptr.object_id = wpp.ID
         JOIN wp3k_term_taxonomy wptt ON wptt.term_taxonomy_id = wptr.term_taxonomy_id
         JOIN wp3k_terms wpt ON wpt.term_id = wptt.term_id
WHERE wpt.slug = 'news';
";

$migrate_vest_media = "
CREATE TABLE `vest_media` (
  `vestID` int(10) NOT NULL,
  `mediaID` int(10) NOT NULL,
  PRIMARY KEY (vestID,mediaID)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
INSERT INTO vest_media (vestID, mediaID)
SELECT v.ID as vestID, jwpp.ID as mediaID
FROM vesti v
    JOIN (SELECT wpp.ID, wpp.post_parent
            FROM wp3k_posts wpp
            WHERE wpp.post_mime_type != '') AS jwpp ON jwpp.post_parent = v.ID;
";

$posts_translation = "
    SELECT p.id, tt.description
        FROM wp3k_posts p 
        JOIN wp3k_term_relationships tr ON tr.object_id = p.id
        JOIN wp3k_term_taxonomy tt ON tt.term_taxonomy_id = tr.term_taxonomy_id
        WHERE tt.taxonomy = 'post_translations'
    ORDER BY p.id DESC;";