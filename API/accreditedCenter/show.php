<?php
$db = \Core\App::resolve(\Core\Database::class);
$lang = (isset($_GET["lang"]) && $_GET["lang"] !== "undefined") ? $_GET["lang"] : "srb";
$slug = $params["slug"];
$sql = "
        SELECT ac.* , m.storeName as hero_image
            FROM akreditovani_centri ac
            JOIN media m ON m.id = ac.hero_image_id
            WHERE ac.slug = :slug AND ac.lang = :lang;
        SELECT sp.*
            FROM akreditovani_centri ac
            JOIN akred_centar_studijski_program acsp ON acsp.centarID = ac.id
            JOIN studijski_programi sp ON sp.id = acsp.spID
            WHERE ac.slug = :slug AND ac.lang = :lang;
";
$centar = $db->query($sql, ["slug" => $slug, "lang" => $lang])->findOne();
$studijskiProgrami = $db->nextRowsetFind();

\Core\Response::send(["centar" => $centar, "studijskiProgrami" => $studijskiProgrami]);

