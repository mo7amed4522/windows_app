URL used for all thing .
pleas add "windows_app.sql" to xampp htdocs or use "localhost:8000/connect.php".

========================== connection ===================================
GET: "localhost/windows_app/connect.php";
========================== auht =========================================
POST: "localhost/windows_app/auth/signin.php";
POST: "localhost/windows_app/auth/signup.php";
========================= FilesData =====================================
POST: "localhost/windows_app/file/getFilesData.php";
POST: "localhost/windows_app/file/deleteFilesData.php";
POST: "localhost/windows_app/file/insertFilesData.php";
POST: "localhost/windows_app/file/updateFilesData.php";
========================= finshed =======================================
GET: "localhost/windows_app/finshed/fullfilled.php";
========================= occupancy =====================================
POST: "localhost/windows_app/occupancy/deleteOccupancy.php";
POST: "localhost/windows_app/occupancy/getOccupancy.php";
POST: "localhost/windows_app/occupancy/insertOccupancy.php";
========================= place =========================================
POST: "localhost/windows_app/place/deletePlace.php";
POST: "localhost/windows_app/place/getPlace.php";
POST: "localhost/windows_app/place/insertPlace.php";
======================== region =========================================
POST: "localhost/windows_app/region/deleteRegion.php";
GET: "localhost/windows_app/region/getRegion.php";
POST: "localhost/windows_app/region/insertRegion.php";
======================== unfinshed ======================================
GET: "localhost/windows_app/unfinshed/unfullfilled.php";


================== path ==================
CREATE VIEW path
AS
SELECT region.ID as id_re,region.name as re_na, place.ID as id_pl, place.name as id_na, occupancy.ID as id_occ,occupancy.name as occ_na, files_data.ID as id_fil, files_data.name as fil_na
FROM region,place,occupancy,files_data
WHERE
files_data.ID_Occupancy =occupancy.ID &&
occupancy.ID_Place = place.ID &&
place.ID_Region = region.ID;

CREATE VIEW pathoccupancy 
AS
SELECT region.ID as re_id,region.name nam_id,place.ID as pl_id,place.name as nam_pl, occupancy.ID as occ_id,occupancy.name as nam_occ
FROM region,place,occupancy
WHERE 
occupancy.ID_Place=place.ID&&
place.ID_Region = region.ID;

CREATE view pathPlace
AS
SELECT region.ID as reg_id,region.name reg_nam,place.ID as pla_id,place.name pla_nam
FROM region,place
WHERE
place.ID_Region = region.ID;