-- MySQL dump 10.14  Distrib 5.5.47-MariaDB, for debian-linux-gnu (i686)
--
-- Host: localhost    Database: savesbestv2
-- ------------------------------------------------------
-- Server version	5.5.47-MariaDB-1ubuntu0.14.04.1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `admin` (
  `adminid` int(5) NOT NULL AUTO_INCREMENT,
  `empid` varchar(10) NOT NULL,
  `userid` int(5) NOT NULL,
  PRIMARY KEY (`adminid`),
  KEY `ua_userid_fk` (`userid`)
) ENGINE=InnoDB AUTO_INCREMENT=10002 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admin`
--

LOCK TABLES `admin` WRITE;
/*!40000 ALTER TABLE `admin` DISABLE KEYS */;
INSERT INTO `admin` VALUES (10000,'E201510000',10000),(10001,'1',10014);
/*!40000 ALTER TABLE `admin` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `admin_administers`
--

DROP TABLE IF EXISTS `admin_administers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `admin_administers` (
  `adminid` int(5) NOT NULL,
  `userid` int(5) NOT NULL,
  `datemodified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  KEY `aa_adminid_fk` (`adminid`),
  KEY `aa_userid_fk` (`userid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admin_administers`
--

LOCK TABLES `admin_administers` WRITE;
/*!40000 ALTER TABLE `admin_administers` DISABLE KEYS */;
/*!40000 ALTER TABLE `admin_administers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `admin_m_section`
--

DROP TABLE IF EXISTS `admin_m_section`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `admin_m_section` (
  `adminid` int(5) NOT NULL,
  `sectionid` int(3) NOT NULL,
  `datemodified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  KEY `ams_adminid_fk` (`adminid`),
  KEY `ams_sectionid_fk` (`sectionid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admin_m_section`
--

LOCK TABLES `admin_m_section` WRITE;
/*!40000 ALTER TABLE `admin_m_section` DISABLE KEYS */;
/*!40000 ALTER TABLE `admin_m_section` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `apothecary`
--

DROP TABLE IF EXISTS `apothecary`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `apothecary` (
  `hid` int(5) NOT NULL AUTO_INCREMENT,
  `sciname` varchar(50) DEFAULT NULL,
  `commonName` varchar(200) DEFAULT NULL,
  `clade` varchar(40) DEFAULT NULL,
  `division` varchar(30) DEFAULT NULL,
  `plantOrder` varchar(30) DEFAULT NULL,
  `family` varchar(30) DEFAULT NULL,
  `d_habit` varchar(30) DEFAULT NULL,
  `d_rootsystem` varchar(30) DEFAULT NULL,
  `d_stem` varchar(30) DEFAULT NULL,
  `d_leaftype` varchar(20) DEFAULT NULL,
  `d_phyllotaxy` varchar(20) DEFAULT NULL,
  `d_fformula` varchar(50) DEFAULT NULL,
  `d_ftype` varchar(40) DEFAULT NULL,
  `plantUse` varchar(500) DEFAULT NULL,
  PRIMARY KEY (`hid`)
) ENGINE=InnoDB AUTO_INCREMENT=50 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `apothecary`
--

LOCK TABLES `apothecary` WRITE;
/*!40000 ALTER TABLE `apothecary` DISABLE KEYS */;
INSERT INTO `apothecary` VALUES (1,'Psidium guajava','Bayabas','Rosids (Malvids)','Magnoliophyta','Myrtales','Myrtaceae','Tree','tap-root system','with secondary growth','simple','opposite',NULL,'berry','Leaf- astringent; anti-microbial; Fruit- edible'),(2,'Vitex negundo','Lagundi','Asterids (Lamiids)','Magnoliophyta','Lamiales','Verbenaceae','shrub','tap-root system','with secondary growth','compound (palmate)','opposite',NULL,'schizocarp','Leaf- anti-asthmatic'),(3,'Allium sativum','Garlic','Monocot','Magnoliophyta','Asparagales','Alliaceae','herb','fibrous root system','no secondary growth','simple','alternate',NULL,'loculicidal capsule','ulbous herbs used in culinary arts'),(4,'Mentha arvense','Yerba buena','Asterids (Lamiids)','Magnoliophyta','Lamiales','Lamiaceae','herb','tap-root system','no secondary growth','simple','alternate',NULL,'schizocarp','Leaf- analgesic'),(5,'Momordica charantia','Ampalaya','Rosids (Fabids)','Magnoliophyta','Cucurbitales','Cucurbitaceae','herb (vine)','tap-root system','no secondary growth','simple','alternate',NULL,'pepo','fruit- edible'),(6,'Peperomia pellucida','Pancit-pancitan','Angiosperms','Magnoliophyta','Piperales','Piperaceae','herb','fibrous root system','no secondary growth','simple','alternate',NULL,'drupe','leaf/ whole plant- anti-gout, arthritis'),(7,'Catharanthus roseus','Tsitsirika','Asterids (Lamiids)','Magnoliophyta','Gentianales','Apocynaceae','herb','tap-root system','no secondary growth','simple','opposite',NULL,'pod or pod-like','leaf/whole plant - vomitive; anti-microbial; used as anti- cancer (vincristine and vinblastine)'),(8,'Zingiber officinale','Ginger','Monocot','Magnoliophyta','Zingiberales','Zingiberaceae','herb','fibrous root system','no secondary growth','simple','alternate',NULL,'loculicidal capsule or berry-like','rhizome- anti-inflammatory; used as culinary flavoring'),(9,'Cassia alata / Senna alata','Akapulko','Rosids (Fabids)','Magnoliophyta','Fabales','Fabaceae','shrub','tap-root system','with secondary growth','simple','opposite',NULL,'pod/ legume','leaf- anti-fungal'),(10,'Equisetum ramosissimum','Horsetail','Lower Vascular Plant','Sphenophyta/ Arthrophyta','Equisetales','Equisetaceae','herb','fibrous root system','hallow (arthrostele)','microphylls','whorled',NULL,'N/A; reproduce by spores','whole plant- diuretic; stem- used to polish brass wares'),(11,'Carica papaya','Papaya','Rosids (Malvids)','Magnoliophyta','Brassicales','Caricaeae','Tree','tap-root system','with secondary growth','simple','alternate',NULL,'berry','fruit - edible; white sap- contains papain'),(12,'Citrofortunella microcarpa','Kalamansi','Rosids (Malvids)','Magnoliophyta','Sapindales','Rutaceae','shrub','tap-root system','with secondary growth','simple','alternate',NULL,'hesperidium','fruit- flavoring; utilized for its essential'),(13,'Aloe barbadensis','Aloe vera','Monocots','Magnoliophyta','Asparagales','Asphodelaceae','herb','fibrous root system','no secondary growth','simple','alternate',NULL,'capsule','leaf- used for soothing skin from burns and dryness; can be a potent laxative'),(14,'Rosa chinensis','Rose','Rosids (Fabids)','Magnoliophyta','Rosales','Rosaceae','shrub','tap-root system','with secondary growth','compound (trifoliate','alternate',NULL,'various fruit types depending on specifi','ornamental plant; petals- edible; extracted for its essential oils'),(15,'Cucumis sativus','Cucumber','Rosids (Fabids)','Magnoliophyta','Cucurbitales','Cucurbitaceae','herb (vine)','tap-root system','no secondary growth','simple','alternate',NULL,'pepo','fruit- edible'),(16,'Cocos nucifera','Coconut','Monocot','Magnoliophyta','Arecales','Arecaceae','Tree','fibrous (wiry) root system','woody','compound (pinnate)','alternate',NULL,'drupe','leaf and stem- used for construction work and textile production; fruit- edible (endosperm)'),(17,'Casuarina equisetifolia','Agoho','Rosids (Fabids)','Magnoliophyta','Fagales','Casuarinaceae','tree','tap-root system','with secondary growth','simple (needle)','alternate',NULL,'samara','stem- hard wood used for furniture and shelter making'),(18,'Pinus kesiya','Pine','Gymnosperm','Pinophyta','Pinales','Pinaceae','tree','woody','','','',NULL,'N/A; seed, wind dispersed','stem- soft wood used for shelter and furniture making; seed- edible; leaf- utilized as tea'),(19,'Colocasia esculenta','Gabi','Monocot','Magnoliophyta','Alismatales','Araceae','herb','fibrous root system','corm','simple','alternate',NULL,'berry','corm / leaf- utilized for food'),(20,'Daucus carota','Carrot','Asterids (Campanulids)','Magnoliophyta','','Apiaceae','herb','tap-root system','no secondary growth','simple','alternate',NULL,'schizocarp','enlarged root- edible'),(21,'Ipomoea batatas','Kamote','Asterids (Lamiids)','Magnoliophyta','Solanales','Convolvulaceae','herb (vine)','tap-root system','no secondary growth','simple','alternate',NULL,'capsule, berry, or nut (for family)','enlarged root/ leaf- edible'),(22,'Solanum tuberosum','Potato','Asterids (Lamiids)','Magnoliophyta','Solanales','Solanaceae','shrub','tap-root system','with secondary growth','simple','opposite',NULL,'berry','tuber- utilized as food'),(23,'Zea mays','Corn','Monocot','Magnoliophyta','Poales','Poaceae','herb','fibrous (wiry) root system','no secondary growth','simple','alternate',NULL,'grain/ caryopsis','endosperm- edible'),(24,'Oryza sativa','Rice','Monocot','Magnoliophyta','Poales','Poaceae','herb','fibrous root system','no secondary growth','simple','alternate',NULL,'grain/ caryopsis','endosperm- edible'),(25,'Cucurbita maxima','Squash','Rosids (Fabids)','Magnoliophyta','Cucurbitales','Cucurbitaceae','herb (vine)','tap-root system','no secondary growth','simple','alternate',NULL,'pepo','fruit- edible'),(26,'Solanum melongena L.','Talong (Tag.), Eggplant (Eng.)','Asterids','Magnoliophyta','Solanales','Solanaceae ','Herb ','Taproot ','Herbaceous','Simple','Flower',NULL,'Berry','Edible fruit'),(27,'Luffa acutangula (L.) Roxb.','Patola (Tag.), Sponge gourd (Eng.)','Rosids','Magnoliophyta','Cucurbitales','Cucurbitaceae','Vine','Taproot ','Herbaceous','Simple','Flower',NULL,'Pepo','Edible fruit'),(28,'Lagenaria siceraria (Molina) Standl.','Upo (Tag.), Bottle gourd (Eng.','Rosids','Magnoliophyta','Cucurbitales','Cucurbitaceae','Vine','Taproot ','Herbaceous','Simple','Flower',NULL,'Pepo','Edible fruit'),(29,'Abelmoschus esculentus (L.) Moench','Okra (Tag.), Lady’s finger (Eng.)','Rosids','Magnoliophyta','Malvales','Malvaceae','Herb ','Taproot ','Woody','Simple','Flower',NULL,'Capsule','Edible fruit'),(30,'Mangifera indica L.','Mangga (Tag.), Mango (Eng.)','Rosids','Magnoliophyta','Sapindales','Anacardiaceae','Tree','Taproot ','Woody','Simple','Flower',NULL,'Drupe','Edible fruit'),(31,'Coffea arabica L.','Kape (Tag.), Coffee (Eng.)','Asterids','Magnoliophyta','Gentianales','Rubiaceae','Shrub','Taproot ','Woody','Simple','Flower',NULL,'Berry','Fruit as beverage'),(32,'Arachis hypogaea L.','Mani (Tag.), Peanut (Eng.)','Rosids','Magnoliophyta','Fabales','Fabaceae','Herb ','Taproot ','Herbaceous','Pinnate','Flower',NULL,'Legume','Edible seeds'),(33,'Solanum lycopersicum L.','Kamatis (Tag.), Tomato (Eng.)','Asterids','Magnoliophyta','Solanales','Solanaceae ','Herb ','Taproot ','Herbaceous','Simple','Flower',NULL,'Berry','Edible fruit'),(34,'Ananas comosus (L.) Merr.','Pinya (Tag.), Pineapple (Eng.)','Monocots','Magnoliophyta','Poales','Bromeliaceae','Herb ','Fibrous','Herbaceous','Simple','Flower',NULL,'Multiple','Edible fruit'),(35,'Sesbania grandiflora (L.) Pers.','Katuray (Tag.), Vegetable hummingbird (Eng.)','Rosids','Magnoliophyta','Fabales','Fabaceae','Tree','Taproot ','Woody','Pinnate','Flower',NULL,'Legume','Edible flower'),(36,'Ixora coccinea L.','Santan (Tag.), Jungle geranium (Eng.)','Asterids','Magnoliophyta','Gentianales','Rubiaceae','Shrub','Taproot ','Woody','Simple','Flower',NULL,'Berry','Ornamental'),(37,'Helianthus annuus L.','Mirasol (Tag.), Sunflower (Eng.)','Asterids','Magnoliophyta','Asterales','Asteraceae','Herb ','Taproot ','Herbaceous','Simple','Flower',NULL,'Achene','Edible seeds, ornamental'),(38,'Hibiscus sabdariffa L.','Guragod (Tag.), Roselle (Eng.)','Rosids','Magnoliophyta','Malvales','Malvaceae','Shrub','Taproot ','Woody','Simple','Flower',NULL,'Capsule','Edible flower'),(39,'Clitoria ternatea L.','Pukingan (Tag.), Butterfly pea (Eng.)','Rosids','Magnoliophyta','Fabales','Fabaceae','Vine','Taproot ','Herbaceous','Pinnate','Flower',NULL,'Legume','Edible flower'),(40,'Mirabilis jalapa L.','Alas cuatro (Tag.), Four o’clock plant (Eng.)','Caryophyllids','Magnoliophyta','Caryophyllales','Nyctaginaceae','Herb ','Taproot ','Herbaceous','Simple','Flower',NULL,'Berry','Ornamental'),(41,'Sphagnum L.','Lumot (Tag.), Peat moss(Eng.)','N/A','Bryophyta','Sphagnales','Sphagnaceae','Leafy thallose','Rhizoidal','Herbaceous','Thallose','Capsule',NULL,'N/A','Soil conditioner'),(42,'Marchantia L.','N/A (Tag.), Liverwort (Eng.)','N/A','Marchantiophyta','Marchantiales','Marchantiaceae','Thallose','Rhizoidal','Herbaceous','Thallose','Capsule',NULL,'N/A','Folkloric treatment for kidney ailments'),(43,'Psilotum nudum L.','N/A (Tag.), Whisk fern (Eng.)','N/A','Pteridophyta','Psilotales','Psilotaceae','Herb ','Rhizoidal','Herbaceous','(Enations)','Synangium',NULL,'N/A','Ornamental'),(44,'Selaginella plana (Desv. ex Poir.) Hieron.','N/A (Tag.), Spike moss (Eng.)','N/A','Lycopodiophyta','Selaginellales','Selaginellaceae','Herb ','Fibrous','Herbaceous','Microphyll','Strobilus',NULL,'N/A','Ornamental'),(45,'Diplazium esculentum (Retz.) Sw.','Pako (Tag.), Vegetable fern (Eng.)','N/A','Pteridophyta','Polypodiales','Athyriaceae','Herb ','Fibrous','Herbaceous','Pinnate','Sorus',NULL,'N/A','Edible fronds'),(46,'Lygodium japonicum (Thunb.) Sw.','Nito (Tag.), Red finger fern (Eng.)','N/A','Pteridophyta','Schizaeales','Schizaeaceae','Vine','Fibrous','Herbaceous','Pinnate','Sorus',NULL,'N/A','Stem used in handicraft'),(47,'Azolla pinnata R. Br.','Asola (Tag.), Water velvet (Eng.)','N/A','Pteridophyta','Salviniales','Salviniaceae','Herb ','Fibrous','Herbaceous','Simple','Sorus',NULL,'N/A','Biofertilizer'),(48,'Cycas circinalis L.','Pitogo (Tag.), Sago palm (Eng.)','N/A','Cycadophyta','Cycadales','Cycadaceae','Palm-like','Coralloid','Woody','Pinnate','Strobilus',NULL,'N/A','Ornamental'),(49,'Gnetum gnemon L.','Bago (Tag.), Melinjo nut (Eng.)','N/A','Gnetophyta','Gnetales','Gnetaceae','Tree-like','Taproot ','Woody','Simple','Strobilus',NULL,'N/A','Edible young leaves, Ornamental');
/*!40000 ALTER TABLE `apothecary` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bot_journal`
--

DROP TABLE IF EXISTS `bot_journal`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bot_journal` (
  `termid` int(5) NOT NULL AUTO_INCREMENT,
  `term` varchar(50) DEFAULT NULL,
  `description` varchar(300) DEFAULT NULL,
  PRIMARY KEY (`termid`)
) ENGINE=InnoDB AUTO_INCREMENT=498 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bot_journal`
--

LOCK TABLES `bot_journal` WRITE;
/*!40000 ALTER TABLE `bot_journal` DISABLE KEYS */;
INSERT INTO `bot_journal` VALUES (1,'Abaxial','directed away from the axis  synonymous with lower or ventral side.'),(2,'ABC model','a model of floral development, in which gene products of the so called A, B, and C classes combine to produce the four major floral organs: sepals, petals, stamens, and carpels.'),(3,'Albuminous cell','a component cell of the phloem tissue in gymnosperms connected with and controlling the activities of an enucleate sieve cell.'),(4,'Acaulescent','lacking an above ground stem other than the inflorescence axis. (stem habit)'),(5,'Accession number','a number assigned to each specimen placed into a permanent herbarium collection.'),(6,'Accessioning','the assignment of a number to all new specimens placed into a permanent herbarium collection.'),(7,'Accessory bud','bud(s) lateral to or above axillary buds. (bud type)'),(8,'Accessory part','A portion of the mature fruit that is not directly derived from the ovary or ovaries, may include bract(s), stem, axes, receptacle, hypanthium, or perianth. (fruit part)'),(9,'Accrescent','parts persistent and continuing to grow beyond what is normal or typical, e.g., calyx of Physalis, Solanaceae. (duration)'),(10,'Acetolysis','a standard acid treatment used to dissolve all but the exine of pollen grains in order to better observe pollen wall structure with the light microscope.'),(11,'Achene','a simple dry indehiscent fruit derived from a one loculed superior ovary, containing a lone seed attached at one point only.'),(12,'Achenecetum','an aggregate fruit of achenes, e.g., Fragaria (strawberry), in which the achenes are on the surface of accessory tissue, an enlarged, fleshy receptacle. (fruit type)'),(13,'Achlamydeous','lacking a perianth. (perianth merosity)'),(14,'Achlorophyllous','lacking chlorophyll/chloroplasts.'),(15,'Acicular','needlelike, often round in cross section, with margins straight and parallel, length: width > 12:1. (shape)'),(16,'Actinomorphic flower','regular flower  one which the whorls of floral parts seem to radiate from the center.'),(17,'Actinostele','a type of protostele in which the centrally located xylem plate has a periphery with ridges or lobes, in between of which is a strand of phloem tissue.'),(18,'Adaxial','directed towards the axis  synonymous with upper dorsal side.'),(19,'Adnation','the union of members of the different whorls of floral parts.'),(20,'Adventitious','descriptive organs in the plant body that arise from places other than those from which they normally arise.'),(21,'Aggregate fruit','one that develop from a single flower with many ovaries.'),(22,'Albuminous seed','one which the endosperm is present until seed maturity.'),(23,'Alternate leaf arrangement','one which a single leaf arises per node of the stem.'),(24,'Alternate vascular bundle','radial vascular tissue; one which xylem and phloem tissues occur in alternating radii of the plant axis, e.g. root; also called radial vascular bundle.'),(25,'Amphicribral','descripttive of a concentric vascular bundle in which the phloem completely surrounds the xylem.'),(26,'Amphistomatic','pertains to a leaf with stomata on both upper (adaxial) and lower (abaxial) surfaces.'),(27,'Amphivasal','descriptive of a concentric vascular bundle in which the xylem completely surrounds the phloem.'),(28,'Anatomy','a branch of biology that is concerned with the internal structure of an organism.'),(29,'Androecium','a collective term for stamens of a flower.'),(30,'Androstrobilus','staminate cone or male cone.'),(31,'Angiosperm','one of the members of the class Angiospermae  a flowering plant.'),(32,'Anisophylly','a condition in which the leaves of a plant are not of the same size.'),(33,'Annulus','a linear series of thick walled cells running vertically upwards from the base of the spore case of a fern and aids in sporangial dehiscence.'),(34,'Anther','a spore case borne at the apex of the filament of a stamen and contains microsporocytes and microspores.'),(35,'Antheridium','male gametangium.'),(36,'Antherozoid','a flagellated male gamete.'),(37,'Anthocyanin','violet pigment of some plants contained in the vacuole.'),(38,'Anticlinal','indicative of an orientation that is right angle to the surface of the structure.'),(39,'Antipodals','a group of three haploid cells located in the chalazal end of an embryo sac.'),(40,'Apical initial cell','the dividing pyramidal cell in the shoot apices of many primitive tracheophytes.'),(41,'Apical meristem','in the root or shoot tip, this is a group of actively dividing cells.'),(42,'Archegonium','female gametangium.'),(43,'Arthrophyta','a division of the plant kingdom that includes the horsetails. Literally, it means jointed plants.'),(44,'Anthrostele','a special type of siphonostele that contains a system of canals or air spaces, found in Equisetum stem. '),(45,'Artificial system of classification','one that gives importance to one or a few morphological characters as basis for grouping organisms.'),(46,'Atactostele','a stele with vascular bundles scattered in the fundamental or ground tissue such that cortex are not clearly delimited.'),(47,'Auricle','in some monocots, a pair of ear like extensions located at the base of the blade.'),(48,'Axile placentation','one in which ovules are attached to an elongated axis dividing the ovary in several locules.'),(49,'Bark','includes all tissues external to the vascular cambium during secondary growth, namely, the periderm, secondary phloem and remnants of primary phloem tissues and cortex.'),(50,'Berry','a fleshy fruit with succulent pericarp enclosing one or many seeds.'),(51,'Bicollateral vascular bundle','an arrangement of the vascular tissues in which an internal phloem is present such that the xylem is sandwiched between it and the externalphloem.'),(52,'Binomial','having two parts to a name  the genus and specific epithet.'),(53,'Blade','lamina  the expanded part of a leaf.'),(54,'Brachysclereid','stone cell  a sclerenchymatous almost isodiametric cell with a much reduced cell activity.'),(55,'Bract','a brilliantly colored leaf  a non green foliar tissue  one of the members of the cone Pinus which bears a pair of winged seeds on its adaxial side.'),(56,'Branch root','lateral root formed through cell division in the pericyle.'),(57,'Bulb','the structure formed by the overlapping of thickened leaf sheaths.'),(58,'Bulliform cell','motor cells  one of the enlarged epidermal cells of a grass leaf that on losing its turgidity brings about involution or the curving up of a leaf.'),(59,'Bundle sheath','a ring like structure formed by one or more layers of parenchyma cells surrounding a vascular bundle.'),(60,'Calyx','collective term for sepals.'),(61,'Cambial growth','the tissues added to the stem or root as a result of cell division in the vascular cambium  growth resulting from the division of cells in the cambium.'),(62,'Capitulum',' a crowded group of sessile or subsessile flowers on a compound receptacle or torus. Some plants have florets differentiated into rays and disc florets. See also Head.'),(63,'Capsule','a simple dry dehiscent fruit developed from an ovary with two or more carpels that split open along narrow lines or pores.'),(64,'Carinal canal','in cross section, this appears as a circular space formed when the protostele of an arthrostele is disrupted.'),(65,'Carl Linnaues','a Swedish botanist and medical doctor who spearheaded the binomial system of naming plants. See also. Linnaeus, Carl.'),(66,'Carotene','an orange colored pigment that is a precursor of Vitamin A and is found inside the chloroplast.'),(67,'Carotenoids','a group of plant pigments ranging in color from red to yellow and orange; includes lycopene, xanthophyll, and carotene.'),(68,'Carpel','one of the components of a gynoecium in which ovules are found'),(69,'Caruncle','a spongy structure originating from the seed coat and conceals the micropyle in the seed as in Ricinus seed.'),(70,'Caryopsis','grain  a simple dry indehiscent fruit whose pericarp and seed coat are fused and ndistinguishable.'),(71,'Casparian strip','a strip of suberized material impregnating the radial and transverse walls of the endodermal cells especially in roots.'),(72,'Catkin','a unisexual spike or raceme, generally pendulous, and that fall as a unit after flowering or fruiting.'),(73,'Cell','the basic unit of structure and function comprising the bodies of plants and animals.'),(74,'Cellulose','glucose polymers forming microfibrils in the plant cell wall.'),(75,'Cell plate','in a dividing plant cell, this is a structure perpendicular to the spindle fibers which is formed by the gathering of vesicles originating from the Golgi bodies. Eukaryotic plant cells divide by cell plate formation.'),(76,'Cell wall','the non living cellulosic outer covering of a plant cell.'),(77,'Centric leaf','one that bears a centrally located vascular tissue surrounded by an endodermis and an outer homogenous mesophyll, e.g. Pinus.'),(78,'Chalazal end','the part of an ovule opposite the micropylar end.'),(79,'Classification','placement of plants under groups or categories according to an accepted nomenclature system.'),(80,'Chlorophyll','green pigment responsible for photosynthesis found inside the chloroplast.'),(81,'Chloroplast','one of a group of organelles called plastids containing mostly chlorophyll and serves as the site of photosynthesis.'),(82,'Chromoplast','the type of plastid containing mostly the pigments xanthophyll and carotene.'),(83,'Circinate vernation','in ferns and some gymnosperms, the coiled condition of a developing leaf.'),(84,'Classification','placements of plants under groups or categories according to an accepted nomenclature system.'),(85,'Coleoptile','a sheath of tissue enclosing the epicotyl of a grass embryo.'),(86,'Coleorhiza','a sheath of tissue enclosing the epicotyl of a grass embryo.'),(87,'Collateral vascular bundle','one which the xylem and phloem occur in the same radius  common in dicot stems.'),(88,'Collenchyma','living type of plant cell with highly hydrated walls serving for mechanical support of young aerial tissues.'),(89,'Companion cell','a nucleated phloem member that accompanies the sieve tube element in angiosperms. Its nucleus exercises control over the enucleate sieve tube element with which it is connected with plasmodesmata.'),(90,'Compartmentalization/Compartmentation','in eukaryotic cells, a condition arising from the presence of membrane enclosed organelles.'),(91,'Complete flower','one that bears all of the four whorls of floral parts namely, sepals, petals, stamens, and pistils.'),(92,'Compound fruit','one that develops from two or more ovaries of a single flower or form a cluster of flowers in an inflorescence.'),(93,'Compound leaf','one in which the blade is subdivided into leaflets.'),(94,'Concentric vascular bundle ','an arrangement of the vascular tissues in which either xylem or phloem completely surrounds the other. See Amphicribral or Amphivasal.'),(95,'Condenser','a set of lenses under the microscope stage that concentrates light rays.'),(96,'Conifer','a gymnosperm belonging to the order Coniferales -a cone-bearing plant.'),(97,'Cork','see Phellem.'),(98,'Cork cambium','see Phellogen'),(99,'Cork cells','see Phellem.'),(100,'Cork parenchyma','see Phelloderm.'),(101,'Corm','a short, enlarge, vertical underground storage stem.'),(102,'Corolla','a collective term for petals.'),(103,'Corpus','in the shoot apex this group of meristematic cells that lie under the tunica and divide into various planes.'),(104,'Cortex','the tissue that lies between the epidermis and the stele of the root/ stem in its primary growth. It is largely made up of parenchyma with interspersed sclerenchyma cells.'),(105,'Corymb','the flat  topped inflorescence with outer florets blooming ahead of the inner ones.'),(106,'Cotyledon','seed leaf  the storage tissue of seeds that is single in a monocot and paired in a dicot plant.'),(107,'Crossing','over   a process in which chromatids break and exchange segments.'),(108,'Cross','Section - transverse cut- a cut made perpendicular to the axis.'),(109,'Crozier','coiled apex.'),(110,'Crystal','accumulated mineral, protein or other substance deposit stored inside a plant vacuole exhibiting distinct geometric shapes.'),(111,'Cuticle','a waxy layer of cutin deposited on the outer epidermal cell walls making them less pervious to water.'),(112,'Cutin','a wax  like, fatty, hydrophobic substance impregnating the epidermal wall especially of leaves.'),(113,'Cyclosis','protoplasmic streaming  the cyclic flow of the protoplast inside a living cell.'),(114,'Cyme','an inflorescence whose central flowers bloom ahead of peripheral ones.'),(115,'Cypsella','a dry indehiscent fruit developed from one  loculed inferior ovary.'),(116,'Cystolith','a calcium carbonate crystal that appears like a sac of stones, found in Ficus leaf.'),(117,'Cytoplasm','the living aqueous matrix of the cell where the organelles are suspended.'),(118,'Cytoplasmic streaming','movement of the cytoplasm in a living cell.'),(119,'Dedifferentiation','a process by which an already mature cell reverts back to its meristematic condition.'),(120,'Derivative','one of the two cells produced during mitosis that is destined to undergo further differentiation.'),(121,'Dermal tissue','epidermis.'),(122,'Dichotomous branching','branching pattern in which the main branch always forms two branches.'),(123,'Dichotomous key','a set of two contrasting characters used in identifying an unknown plant. It usually starts with the more general or encompassing characters and proceeds to the more specific ones. See alsoTaxonomic key.'),(124,'Dicot','a plant with two cotyledons.'),(125,'Differentiation','a process by which a cell, tissue or organ changes structurally and functionally in the course of development.'),(126,'Diffuse secondary growth','one that results from the division of some parenchyma cells in the ground tissue.'),(127,'Dioecious plant','one in which the staminate and pistillate flowers are borne by separate individuals of the same species.'),(128,'Diploid (2n)','having two sets of chromosomes.'),(129,'Diplonema','a stage in Prophase I where crossing  over or chiasma formation can be observed.'),(130,'Dorsiventral','said of a leaf with a distinct adaxial (upper) and abaxial (lower) sides.'),(131,'Double fertilization','the simultaneous fusion of a sperm nucleus with the egg cell, and another sperm cell with the endosperm mother cell in the embryo sac of an angiosperm.'),(132,'Drupe','a simple, fleshy, one seeded fruit with a distinct mesocarp surrounding a very hard or stony endocarp.'),(133,'Druse','a calcium oxalate star shaped crystal found in Nerium.'),(134,'Egg cell','a female gamete or sex cell.'),(135,'Elater','thickened bands of Equisetum spore wall that coil when moist and uncoil when dry.'),(136,'Embryo sporophyte','the young sporophytic plant.'),(137,'Embryo sac','the female gametophyte of an angiosperm where one egg cell, two synergids, two polar nuclei and three antipodals are found.'),(138,'Embryonic axis','the root shoot axis of a plant embryo.'),(139,'Enation','a small flap of tissue without vein found all over the surface of the stem Psilotum.'),(140,'Endarch','as applied to the primary xylem, this is where the protoxylem is towards the central core of the cross section, while the metaxylem is away from it, e.g. young stems.'),(141,'Endocarp','innermost layer of the pericarp.'),(142,'Endodermis','innermost layer of the cells of the cortex which typically bears a casparian strip.'),(143,'Endoplasmic reticulum','complex system of membranes in cytoplasm of eukaryotic cells some portions of which are associated ribosomes.'),(144,'Endosperm','the triploid, nutritive tissue in some seeds that develop from the union of a sperm nucleus and the endosperm mother cell (two polar nuclei) in the megagametophyte of flowering plants.'),(145,'Endosporic gametophyte','one that develops inside or within the spore wall.'),(146,'Endospory','condition in which the gametophyte develops while still surrounded by the spore wall.'),(147,'Entire leaf margin','leaf margin without indentations.'),(148,'Epicotyl','the part of the embryonic axis above the point of attachment of the cotyledon(s) that give rise to the shoot.'),(149,'Epidermis','an external tissue, one to several layers of thick cells, covering the plant body in its primary state of growth.'),(150,'Epigeal','a type of seed germination where the cotyledons are raised above the substratum by the growing plant.'),(151,'Epigynous flower','one that bears an inferior ovary.'),(152,'Equatorial region','mid region of a dividing cell or nucleus.'),(153,'Ergastic substance','non  living inclusion of the plant cell, like starch grains and crystals.'),(154,'Eustele','a stele with a pith surrounded by a circle of fascicular vascular bundles.'),(155,'Exarch','as applied to the primary xylem, this is where the metaxylem is towards the central core of the cross section, while the protoxylem is away from it, e.g. in the young root.'),(156,'Exindusiate','said of a fern sorus that has no indusium.'),(157,'Exocarp','the outer layer of a pericarp.'),(158,'Exosporic gametophyte','one that develops only after the spore wall has been broken.'),(159,'False indusium','the leaf margin of a fern that curves under thereby giving some protection to the developing sori.'),(160,'Family','a group of genera with similar traits.'),(161,'Fern allies','vascular plants that are similar to the ferns based on the simplicity of their structure, e.g. horsetails and the lycophytes.'),(162,'Fertilization','the process of union of a sperm nucleus with an egg cell.'),(163,'Fiber','a type of sclerenchyma cell that has an elongated shape with pointed ends, and functions for mechanical support.'),(164,'Fibrous root system','a type of root system in which the individual roots are threadlike, and more or less of same size and appearance.'),(165,'Fibrovascular bundle','a discrete vascular bundle of primary origin bearing an outer ring of sclerenchymatous cells.'),(166,'Field label','a slip of paper where pertinent information about a collected specimen are written.'),(167,'Filament','an elongated structure of varied length which bears the anther  stalk of the stamen.'),(168,'Flaccid','pertains to a cell that is collapsed state due to a decreased water content. Flaccid guard cells will cause the stomata to close.'),(169,'Floret','a member of inflorescence.'),(170,'Flower','a modified branch with whorls of floral parts that ensure the occurrence of sexual reproduction in angiosperms or flowering plants  a structure produced by sexually reproducing angiosperms.'),(171,'Flower bud','an unopened flower.'),(172,'Focusing knobs','in the dissecting microscope, these are manipulated to put the specimen in focus.'),(173,'Free central placentation','one in which the ovules are attached to a basal placenta in a unilocular ovary.'),(174,'Free venation','one in which the veins of a leaf have no apparent interconnections.'),(175,'Fruit','ripened ovary of a flower.'),(176,'Fruit wall','fruit covering formed by the pericarp fused with other floral tissues of an epigynous flower.'),(177,'Funiculus','stalk that anchors the ovule to the placenta.'),(178,'Gametangium','a multicellular structure in which either male gametes (antherozoids) or a female gamete (egg cell) are formed. See also Antheridium and Archegonium.'),(179,'Gamete','sex cell.'),(180,'Gametophyte','a haploid, gamete  producing plant or similarity functioning structure like the pollen grain (male gametophyte) or embryo sac (female gametophyte).'),(181,'Gene','the basic unit of heredity and is responsible for a particular trait or group of traits.'),(182,'Generative cell','one of two haploid cells inside a pollen grain that divides by mitosis to form two sperm cells.'),(183,'Genus','the first name in a binomial which begins with a capital letter. Organisms belonging to the same genus are regarded as closely related species.'),(184,'Ground meristem','one of the three groups of primary meristems which, in the stem, gives rise to the ground tissues, namely the cortex and pith.'),(185,'Growth ring','in the transverse section of the stem, this is composed of unevenly stained concentric rings of tissues that make up the wood. It represents a ring of secondary xylem formed during a season.'),(186,'Guard cells','a pair of chloroplast bearing specialized epidermal cells, kidney   shaped in most dicots or dumbbell shaped in most grasses, that control the opening of a stoma.'),(187,'Guttation','the process by which water in liquid form escapes through the hydathodes located along the margins of leaves. This is specially seen in monocots.'),(188,'Gymnosperm','a higher vascular plant with naked seeds.'),(189,'Gynoecium','collective term for the pistils.'),(190,'Gynostrobilus','female, or ovulate cone.'),(191,'Habit','the totality of a plant’s external appearance.'),(192,'Habitat','environment in which a plant grows.'),(193,'Half','inferior ovary   one whose sepals, petals and stamens are raised by the receptacle that fuses with the ovary up to its mid region.'),(194,'Haploid (n)','having only one set of chromosomes.'),(195,'Head','crowded group of sessile or subsessile flowers on a compound receptacle or torus. Some plants have florets differentiated into rays and disc florets. See also Capitulum.'),(196,'Hemicellulose','paracrystalline carbohydrate component of the cell wall matrix.'),(197,'Herbarium','a place that keeps a documented collection of properly identified and classified plant specimens, mostly dried.'),(198,'Hermaphrodite','having both male and female organs in the same flower.'),(199,'Hesperidium','a fleshly septated berry with leathery exocarp, the bulk of its edible parts comprised of glandular hairs.'),(200,'Heterophylly','having two kinds of leaves that differ in appearance.'),(201,'Heterospory','a condition of having two types of spores, one germinating into a male gametophyte and the other into a female gametophyte.'),(202,'Higher vascular plant','a spore  or seed bearing vascular plant that develops a megaphyll.'),(203,'Hilum','a scar left on the seed coat by the detached funiculus.'),(204,'Homophylly','a condition of having only one type of leaves.'),(205,'Homospory','a condition of having only one type of spores.'),(206,'Hydathode','a tiny opening along the margins specially of monocot leaves through which water in liquid form escapes in a process called guttation.'),(207,'Hydromorphic','pertaining to a feature associated with aquatic habitats.'),(208,'Hypanthium','a tube formed by the fusion of the calyx, corolla and androecium of an epigynous flower.'),(209,'Hypocotyl','the part of the embryonic axis that lies below the point of attachment of the cotyledon(s).'),(210,'Hypodermis','a differentiated sclerenchymatous tissue under the epidermis of roots, some stems, and pine leaf.'),(211,'Hypogeal germination','one in which the cotyledon or cotyledons remain in the ground.'),(212,'Hypogynous flower','flower with a superior ovary  floral parts are inserted below the ovary.'),(213,'ICBN','International Code of Botanical Nomenclature. A document containing the sets of rules and principles that are applied in naming new plants or in changing current names.'),(214,'Imperfect (unisexual) flower','one that lacks either a pistil or stamen.'),(215,'Incomplete flower','one with only three whorls of floral parts.'),(216,'Indusium','a flap of differentiated tissue that partly covers a fern sorus.'),(217,'Inflorescence','an aggregate of little flowers.'),(218,'Infructescence','a fruit developed from the fusion of fruitlets and floral bracts of an inflorescence.'),(219,'Initial','a dividing cell.'),(220,'Integument','the covering of an angiosperm ovule that comprises of two layers, the inner and outer integuments, and later mature into the seed coat.'),(221,'Intercalary meristem','a meristematic region between two successive nodes in the stem of monocots.'),(222,'Intercellular space','area in between loosely packed cells.'),(223,'International Code of Botanical Nomenclature (ICBN','sets of rules and principles that are applied when naming new plants or in changing the names of plants.'),(224,'Internode','the intervening portion between two successive nodes on the stem.'),(225,'Interphase','a stage in cell division where replication of the genetic material takes place.'),(226,'Iris diaphragm','a system of overlapping plates in the sub stage condenser that may be opened and closed to regulate path of light.'),(227,'Irregular flower','one in which symmetrical parts are obtainable by cutting alone one plane only.'),(228,'Isobilateral','descriptive of a leaf whose upper and lower sides look the same.'),(229,'Keel','two small petals united along their edges found opposite the standard of an irregular flower.'),(230,'Labelum','part of a zygomorphic flower.'),(231,'Lateral meristem','a meristem, located parallel to the side of the plant axis that causes a considerable increase in girth; refers to either the vascular cambium or phellogen; also called secondary meristem.'),(232,'Leaf','a flattened, green, lateral appendage that functional primarily for photosynthesis and transpiration.'),(233,'Leaf fascicle','refers to the grouped leaf needles with their common sheath.'),(234,'Leaf gap','a region of parenchyma in the vascular cylinder of a stem located above the place where a leaf trace diverges toward the leaf.'),(235,'Leaf primordium','a bulge formed by the first leaf that is initiated in the shoot apex.'),(236,'Leaf sheath','in monocots, the lower part of a leaf that takes the place of the petiole.'),(237,'Legume','pod -a simple dry dehiscent fruit formed from one carpel that splits open on its two opposite sides.'),(238,'Lenticel','an elevated area on the bark’s surface, comprised of a loose association of parenchyma cells, and functions for gas exchange and water loss.'),(239,'Leptonema','a stage in prophase I of meiosis where chromosomes appear long and thin the nucleolus is distinctively visible.'),(240,'Lignins','phenolic compounds in the cell wall that lend it compressive strength and stiffness.'),(241,'Ligule','hair like outgrowth at the junction of the blade and leaf sheath of grass.'),(242,'Linnaeus, Carl','Swedish botanist and medical doctor who spearheaded the binomial system of naming plants. See also Carl Linnaeus.'),(243,'Lipid','an ester formed from the combination of fatty acids and glycerol, like fats and oils.'),(244,'Liquid endosperm','the aqueous substance inside a coconut.'),(245,'Locule','a space or cavity inside an ovary or fruit.'),(246,'Loment','a simple dry dehiscent fruit that is like a pod except that it breaks up into one seeded segments.'),(247,'Longi','section  -a longitudinal cut - a plant section passing along the midregion and parallel to the long axis of the plant body.'),(248,'Lower vascular plant','plants with simple or primitive form of tracheary elements.'),(249,'Lumen','space in the cell where the protoplast used to exist -cell cavity.'),(250,'Macrophyll','See megaphyll.'),(251,'Marginal stem','a region of cell division along the margins of a leaf.'),(252,'Mechanical tissue','collenchyma and/or sclerenchyma serving as support tissue.'),(253,'Megagametogenesis','a process by which a female gamete is formed through mitotic division of the functional megaspore.'),(254,'Megaphyll','macrophyll  -a large leaf with many veins its leaf trace associated with a leaf gap.'),(255,'Megaspore','one of the four spores resulting from the division of a megaspore mother cell that differentiates from the nucellus.'),(256,'Megasporangium','a sporangium containing the megaspores.'),(257,'Megaspore mother cell','See Megasporocyte.'),(258,'Megasporocyte','megaspore mother cell  female spore that divides by meiosis.'),(259,'Megasporogenesis','the process by which a megasporocyte divides to form four megaspores.'),(260,'Megasporophyll','a microphyll associated with a megasporangium.'),(261,'Meristem','a region of active cell division.'),(262,'Mesocarp','the middle layer of the pericarp.'),(263,'Mesophyll','the photosynthetic tissue of a leaf which comprises of the palisade layer and the spongy mesophyll.'),(264,'Metamorphosed','specialized  refers to a structure that has been modified so as to carry out he functions other than those which are typical of it.'),(265,'Metaxylem','later formed xylem element, recognizable from a protoxylem element because of its bigger cell cavity.'),(266,'Microgametogenesis','the process of formation of the two sperm cells inside a male gametophyte through mitosis in the microspore.'),(267,'Microphyll','a primitive type of a leaf with an unbranched vein, and without an accompanying eaf gap.'),(268,'Micropyle','an opening in the ovule through which the pollen tube releases the two sperm cells. '),(269,'Microsporangium','pollen sac  a structure containing microspores or pollen grains.'),(270,'Microspore','a haploid male spore  pollen grain  one of the four cells resulting from meiosis in microsporocyte.'),(271,'Microsporocyte','pollen '),(272,'Microsporogenesis','the process by which a microscope is derived from a microsporocyte  through the process or meiosis.'),(273,'Microsporophyll','a sporophyll that bears a microsporangium or pollen sac.'),(274,'Middle lamella','a structure that glues adjacent cell together.'),(275,'Midrib','the extension of the petiole into the leaf blade.'),(276,'Mirror','an optical part of the compound microscope that is used to direct light to the mounted object. It may have a flat side to diffuse bright light and concave side to concentrate dim light towards the specimen.'),(277,'Mirror assembly','in the dissecting microscope, this consists of the mirror, opaque glass and turning knobs of the frame that holds both of these. '),(278,'Mitochondrion','organelle where the aerobic respiration occurs producing energy for the plant.'),(279,'Monocot','a plant with only one cotyledon.'),(280,'Monoecious plant','one in which both the staminate and pistillate flowers are borne by the same individual.'),(281,'Monopodial growth','one in which the main axis bears reduced or no lateral branches.'),(282,'Morphology','science that deals with the study of form, external structure and development of an organism.'),(283,'Motor cell','see Bulliform cells.'),(284,'Multicellular','having many cells.'),(285,'Multiple fruit','one that develops several ovaries from the many flowers of an inflorescence.'),(286,'Natural system of classification','one that considers the phlylogenetic relationships of organisms as basis for assigning these into groups.'),(287,'Node','the part of a stem separating two internodes. It is also the place of origin of leaves and buds.'),(288,'Nomenclature','the assigning of names in the binomial form.'),(289,'Nucellus','a nutritive parenchymatous tissue inside the ovary that is also the origin of a megaspore mother cell.'),(290,'Nuclear membrane','a double layer of biological membranes surrounding a nucleus.'),(291,'Nucleus','a distinct, typically spherical organelle containing the chromosomes and directing cellular activities.'),(292,'Nut','a simple, dry indehiscent, one -sided fruit derived from a one-loculed ovary with a hard pericarp.'),(293,'Off','set- in Eichhornia, this is a stem separating two plantlets.'),(294,'Opposite leaf arrangement','one in which two leaves arise per node.'),(295,'Organ','a group of tissues with specialized functions.'),(296,'Organelle','a discrete, membrane-bounded structure inside a living cell that carries out a specific function.'),(297,'Organism','a plant, animal or microbe.'),(298,'Ovary','the basal part of a pistil where ovules are formed.'),(299,'Ovulate cone','ovulate strobilus -an aggregate of megasporophylls along an elongated axis.'),(300,'Ovule','a structure inside the ovary which, after fertilization, becomes the seed.'),(301,'Palmate','one in which 5-7 units are spread out like the fingers of a hand from a common origin.'),(302,'Panicle','a branched raceme.'),(303,'Parallel venation','one in which the leaf veins occur in rows along the length of the leaf blade.'),(304,'Parenchyma cell','a living, thin-walled, nucleated type of cell in the ground and vascular tissue, which varies in function, structure, size and form.'),(305,'Parietal placentation','one in which the ovules are attached along the wall of a uniloculate ovary.'),(306,'Parthenocarpic','said of a fruit that develops without the benefit of fertilization.'),(307,'Pectin','a complex form of sugar acids in the cell wall.'),(308,'Pedicel','the stalk of a floret in an inflorescence.'),(309,'Peduncle','the stalk of a flower or fruit.'),(310,'Pepo','a fleshy fruit or berry developed from an inferior ovary, its fruit wall being a hard rind formed from the fused receptacle and pericarp.'),(311,'Perfect flower','bisexual flower -one that has both the pistil and stamen.'),(312,'Perianth','the calyx and corolla taken together.'),(313,'Pericarp','the botanical fruit; the layer of ovary tissue in a fruit; collective term for the exocarp, mesocarp and endocarp.'),(314,'Periclinal','parallel to the surface.'),(315,'Pericycle','in the stele, this 1-2 cell layers thick, lying next to the endodermis that serves as the origin of lateral roots, phellogen, and a portion of the vascular cambium.'),(316,'Periderm','a secondary tissue formed by the phellogen that replaces the epidermis; comprised of the phelloderm, phellogen, and phellem.'),(317,'Perigynous','said of a flower with  a half-inferior ovary.'),(318,'Petal','a component of the corolla that attracts pollinators through its bright color or strong scent or both  the brightly-colored part of a colored part of a flower.'),(319,'Petiole','the stalk connecting a leaf to the stem.'),(320,'Phellem','cork cells; a component tissue of the periderm that lies outer to the phellogen; comprised of cells with suberized cell walls, and arise from cell division in the phellogen.'),(321,'Phelloderm','cork parenchyma -a component tissue of the periderm that lies under the phellogen.'),(322,'Phellogen','cork cambium -a secondary meristem responsible for the formation of the periderm -a component tissue of the periderm that is sandwiched between the phelloderm and phellem.'),(323,'Phloem fiber','a member of the phloem that is long, slender, with a small cavity, and functions primarily for mechanical support.'),(324,'Phyllotaxy','pattern of leaf arrangement.'),(325,'Phylogenetic system of classification','system of classification which, considers the totality of characters.'),(326,'Pinna','a leaflet in a fern -frond -leaflet in pinnately compound leaf.'),(327,'Pinnate','descriptive of a compound leaf in which the leaflets arise on both sides of a rachis giving a feather-like appearance.'),(328,'Pistil','the female structure of a flower.'),(329,'Pit','a depression, thin area or discontinuity in the secondary cell wall.'),(330,'Pit canal','the passage from the cell lumen to the chamber of a bordered pit.'),(331,'Pith','parenchyma tissue representing the central core of a siphonostele.'),(332,'Placenta','the nutritive tissue inside the ovary to which ovules are attached.'),(333,'Plant Taxonomy','the science dealing with the identification, nomenclature and classification of plants.'),(334,'Plasmalemma','the biological membrane separating the protoplast from the cell wall.'),(335,'Plasmodesma (pl.plasmodesmata)','strands of protoplasm traversing the thin areas of the cell wall, and connects the protoplasts of adjacent cells.'),(336,'Plastid','a double-membrane organelle inside a eukaryotic cell named according to the chemical nature of the dominant substance that it contains, such as chloroplast, chromoplast and leucoplast.'),(337,'Plectostele','a protostele with phloem strands embedded in the xylem tissue.'),(338,'Plicate','descriptive of a mesophyll cell whose cell wall has infoldings that project into the cell lumen.'),(339,'Plumule','the epicotyl together with the leaf primordia.'),(340,'Polar nuclei','the two nuclei of an endosperm mother cell. These are located at the center of the embryo sac where they are eventually fertilized by a sperm nucleus to form a triploid (3n) primary endosperm cell.'),(341,'Pollen grain','microspore -a spore that germinates into a male gametophyte.'),(342,'Pollen mother cell','see Microsporocyte.'),(343,'Pollen sac','see Microsporangium.'),(344,'Pollen tube','an elongating protrusion of a germinating pollen grain that conveys the two sperm nuclei into the micropyle of an ovule.'),(345,'Pollinator','any agent that transfers pollen grains from the anther the stigma.'),(346,'Polypetalous','said of a flower with petals that are not fused.'),(347,'Polystele','a stele consisting of several ribbon-like protosteles embedded in the ground tissue.'),(348,'Pome','a fleshy fruit with a cartilaginous endocarp, its fleshy receptacle adanate to the pericarp.'),(349,'Prickle','an emergent or superficially formed thorn-like structure on the stem of some plants.'),(350,'Primary  growth','one that results from cell division in primary meristems.'),(351,'Primary meristem','the first meristem to originate from the plant embryo consisting of the protoderm, ground meristem, and procambium. It gives rise to temporary tissues like the epidermis, cortex and primary vascular tissues, and is largely responsible for the plant’s growth in height.'),(352,'Primary phloem','one of the two kinds of primary vascular tissues. It forms through cell division in the procambium.'),(353,'Primary pit fields','thin areas of the primary cell wall and middle lamella within the limits of which, one or more pit pairs develop if a secondary wall is formed.'),(354,'Primary root','root that develops from the radicle. It is the biggest, most conspicuous root in a dicot root system.'),(355,'Primary tissue','tissue derived from the activity of a primary meristem.'),(356,'Primary xylem','one of the two kinds of primary vascular tissues arising from the cell division in the procambium. It is composed of the protoxylem and metaxylem.'),(357,'Procambium','one of the three groups of primary meristems that gives rise to the primary vascular tissues.'),(358,'Promeristem','in the stem apex, this gives rise to the subjacent primary meristems, namely the protoderm, ground meristem and procambium.'),(359,'Protein','an organic substance formed through polymerization of amino acids. Amino acids are joined together by peptide bonds.'),(360,'Prothallus','the heart-shaped gametophyte of most fern species.'),(361,'Protoderm','one of the three groups of primary meristems that gives rise to the epidermis or dermal system.'),(362,'Protoplast','the living component of a cell that is bounded by the cell wall. It includes the cytosol and the cellular organelles that are suspended in it including the nucleus.'),(363,'Protostele','the most primitive type of stele consisting of a central cylinder of vascular tissue with the phloem peripheral to the xylem.'),(364,'Protoxylem','the first-formed xylem, evident during primary growth.'),(365,'Pseudostem','a stem-like structure formed by the overlapping of leaf sheaths.'),(366,'Quiescent region','in the root, this is a small mass of non-dividing cells below the  region of cell division and above the root cap.'),(367,'Raceme','an inflorescence with pedicellate florets distributed along an elongated axis, the younger florets located closer to the apex.'),(368,'Rachis','an extension of the petiole in a pinnately compound leaf.'),(369,'Radial section','a cut passing through the radius and parallel to the plant axis.'),(370,'Radial vascular bundle','see Alternative vascular bundle.'),(371,'Radicle','a rudimentary root that develops into the primary root-primordial root of a seed.'),(372,'Raphe','a mass of tissue between the chalaza and funiculus.'),(373,'Raphide','calcium oxalate crystal appearing as bunch of needles.'),(374,'Ray parenchyma','the parenchymatous tissue in both secondary phloem and xylem of the plant axis that functions to transport materials in the radial direction.'),(375,'Receptacle','terminus of the pedicel upon which the four whorls of floral parts are arranged.'),(376,'Region of cell elongation','that which lies above the region of cell division in young root.'),(377,'Region of cell maturation','root hair zone; that which lies above the region of cell elongation in a young root, where cells are undergoing differentiation.'),(378,'Regular flower','one which the whorls of floral part radiate from the center such that symmetrical parts may be obtained by cutting the flower longitudinally along more than one plane.'),(379,'Resin duct','elongated channels in the stem and leaves of some plants into which resin is secreted, e.g. in Pinus.'),(380,'Resolution','resolving power, the ability of a microscope to show fine details of a microscopic object; a number representing the smallest size of an object that can be seen clearly.'),(381,'Reticulate venation','netted venation, net-like arrangement of veins in the leaf blade.'),(382,'Rhizoid','a hair-like structure or outgrowth that functions for absorption and anchorage, as in the fern prothallus.'),(383,'Rhizome','an underground horizontally oriented storage stem with short internodes and functions for propagation.'),(384,'Rhizopore','aerial root formed by Selaginella.'),(385,'Rhombohedron','calcium oxalate crystal shaped like parallelogram.'),(386,'Root','a typically underground region of the plant axis which functions principally for anchorage and absorption of water and minerals from the substratum.'),(387,'Root cap','calyptra  a thimble -shaped ,mucilaginous mass of parenchymatous cells covering the growing point of a young root.'),(388,'Root hair','tubular outgrowth of a specialized root epidermal cell in the region of cell maturation whose function is to increase the root’s surface area for absorption.'),(389,'Sclereid','stone cell.'),(390,'Sclerenchyma cell','cell type with a thickened, lignified cell wall, that loses its protoplast upon maturity and functions for mechanical support.'),(391,'Scutellum','the shield-like cotyledon in grass embryo.'),(392,'Secondary growth','expansion in diameter of the axis of dicots and gymnosperms due to the activity of secondary meristems.'),(393,'Secondary meristem','one of the two lateral meristems, the vascular cambium and phellogen, which causes considerable increase in girth or diameter of the plant body. It is responsible for deposition of secondary vascular tissues.'),(394,'Secondary phloem','phloem tissue formed by  and lying outer to the vascular cambium.'),(395,'Secondary tissue','tissue produced by the secondary or lateral meristems.'),(396,'Secondary xylem','one that is formed by, and lying inner to the vascular cambium.'),(397,'Seed coat','seed covering developed from the integuments of an ovule.'),(398,'Seed germination','a process evidenced by the resumption of growth of the embryo and is manifested by the rupture of the seed coat. It marks the termination of seed dormancy.'),(399,'Self','pollination  -the transfer of pollen from the anther to the stigma of the same plant/flower.'),(400,'Sepal','a member of the outermost whorl of floral parts ad is usually green in color ;a component of the calyx whose function is to cover and protect the floral bud.'),(401,'Septum','a structure dividing a cavity into smaller compartments  -a partition wall.'),(402,'Sessile','said of a leaf or flower that has no stalk.'),(403,'Sexual reproduction','a type of reproduction seen only in organisms with a true nucleus which involves the union of haploid cells called gamete or sex cells.'),(404,'Shell','in pineapple, this is the fruit’s hard covering which consists of sepals, bract tissues and the apices of ovaries.'),(405,'Shoot','the upright often aerial portion of a plant.'),(406,'Shrub','a woody plant whose branching arises near the ground.'),(407,'Sieve cell','the phloem conducting cell in gymnosperms that is long and tapered with small sieve areas over much of their surfaces.'),(408,'Sieve tube element','specialized living , conducting cell of the phloem that is enucleate at maturity, arranged end to end forming a continuous tube through which organic substances pass in the plant body.'),(409,'Silique','a simple dry dehiscent fruit developed from two or more carpels, the latter becoming separated from each other by a septum or partition wall when mature.'),(410,'Simple fruit','one that is derived from a single ovary consisting of one or several fused carpels.'),(411,'Simple leaf','one in which the blade is in one piece.'),(412,'Siphonostele','stele with pith.'),(413,'Solid endosperm','in cocomut, the white fleshy tissue inside the stony endocarp.'),(414,'Sorus','in ferns, a mass of sporangia in the leaf that may or may not have an indusium.'),(415,'Spandix','a fleshy spike with an enveloping sheath called spathe.'),(416,'Species','a population of genetically identical or similar organisms that have interbreed under natural conditions.'),(417,'Specific epithet','the second name in a binomial. It begins with a small letter and is italicized in the genus.'),(418,'Specimen','any material that serves as the primary focus of the study.'),(419,'Sperm','male gametes  -see also antherozoid.'),(420,'Sperm cell','one of the two haploid cells formed after the division of the generative nucleus in a pollen.'),(421,'Spike','an inflorescence with an elongated axis, the florets sessile, becoming progressively younger towards the apex.'),(422,'Spindle fiber','one of the proteinaceous microtubules that comprise the spindle -shaped structure in a dividing nucleus.'),(423,'Spine','a short, modified, pointed and vasculated stem projects as an organ.'),(424,'Spongy mesophyll ','the part of a leaf whose cells are loosely arranged due to the many large intercellular spaces between them. It occurs under the palisade of leaves that have this tissue.'),(425,'Sporangiophore','Umbrella-like structure in strobilus of Equisetum containing the sporangia on its margin. '),(426,'Sporangium','a spore case.'),(427,'Sporophyll','a microphyll accompanying a sporangium.'),(428,'Sporophyte','a diploid, spore-producing plant.'),(429,'Stamen','the male reproductive part of a flower consisting of filament and anther.'),(430,'Staminate cone','androstrobilus -a male cone or strobilus consisting of units called microsporophylls and their associated sporangia.'),(431,'Staminate flower','an imperfect flower with stamen only.'),(432,'Standard','the single, broad leaf conspicuous petal of an irregular flower.'),(433,'Starch grain','a non-living cell inclusion that is the storage form of carbohydrates in  most plants.'),(434,'Stele','the vascular tissues together with the pericycle and pith, if present.'),(435,'Stem','the above-ground portion of the plant axis that produces and holds up aerial parts, and conducts water, minerals and photosynthesis inside the plant.'),(436,'Stigma','the uppermost part of a pistil on which the grains are collected and stimulated to germinate.'),(437,'Stipe','an elongated petiole -the stalk of a fern leaf.'),(438,'Stipule','one or two outgrowths at the base of the petiole of some leaves.'),(439,'Stolon','runner -a modified stem that grows on the surface of the ground and is suited as a propagative material.'),(440,'Stoma (pl. stomata/stomates)','a minute opening in leaves (rarely in stems) that allow carbon dioxide to enter and water and oxygen to pass out of the plant body. It is bounded by two guard cells.'),(441,'Stomatal apparatus','organized structures found in the leaves (rarely in stems), consisting of specialized epidermal cells such as a pair of guard cells surrounding a pore or stoma together with a number of subsidiary cells enclosing the guard cells.'),(442,'Stomatal crypt','a depression in the leaf of some plants inside of which are stomata and trichomes.'),(443,'Stromium','the opening of a fern sporangium through which spores are released.'),(444,'Strobilus','an enclosed structure consisting of a mass of sporophylls and their associated sporangia on the surface of an elongated axis.'),(445,'Style','a slender, hollow tube arising from the ovary extending into the stigma. It is traversed by an elongating pollen tube.'),(446,'Subsidiary cells','variously shaped epidermal cells immediately surrounding the guard cells - physiologically involved in the regulation of the stomatal pore.'),(447,'Superior ovary','one that is on top of the three other whorls of floral parts.'),(448,'Synagium','a structure formed by the fusion of the sporangia  -tri-lobed sporangium.'),(449,'Synergids','two haploid cells lying beside the egg cell at the micropylar end of the embryo sac.'),(450,'Sympodial','a type of branching where, instead of a main axis, a number of lateral branches arise which are more or less of the same size.'),(451,'Tangential section','a cut running parallel to the plant axis at right angle to the radius but not passing through its diameter.'),(452,'Tapetum','a layer of cells lining the pollen sac and providing nutrition to the developing microspore.'),(453,'Taproot','see Primary root. '),(454,'Taproot system','a type of a root system found in dicots which forms a prominent primary root that gives rise to smaller branch roots.'),(455,'Taxonomic key','this presents a step-wise fashion a series of two contrasting characters to choose from identifying an unknown species.'),(456,'Tendril','a modified, slender stem, that twines about objects to prop up the plant.'),(457,'Tepal','slender leaf-like structure in a flower located below the sepals.'),(458,'Testa','seed coat.'),(459,'Tetrad','a group of four.'),(460,'Tonoplast','vacuolar membrane.'),(461,'Trabecula (plu.trabeculae)','in Selaginella -these are remnants of endodermal cells connecting the stele of the cortex.'),(462,'Tracheary element','sclerenchyma cells for mechanical support like sclereids and fibers.'),(463,'Tracheid','an element of the xylem that is long, thin, tapering, sclerenchymatous, without a pore or perforation and functions for water conduction and support.'),(464,'Tracheophyte','vascular plant -a plant with well-developed vascular system.'),(465,'Transfusion tissue','in a pine needle, this is a tissue found on the xylem side of the centrally located vascular bundle which functions like a lateral vein.'),(466,'Transverse section','see Cross section.'),(467,'Trichoblast','a special epidermal cell of the root that grows into a root hair.'),(468,'Trichome','a unicellular or multicellular epidermal out-growth, hair-like structures that are found inside the stomatal crypt.'),(469,'Trifoliate','a compound leaf with three leaflets.'),(470,'Triple fusion','a nuclear union involving a sperm nucleus and the two polar nuclei inside the embryo sac.'),(471,'True indusium','a flap of differentiated protective tissue that accompanies the sorus of some ferns.'),(472,'Tube cell','one of two cells inside a pollen grain when it is shed from the anther. It moves and stays close to the tip of the pollen tube.'),(473,'Tunica','in the shoot apex, the outer layer or layer of cells that divide only anticlinally.'),(474,'Tunica','corpus  -a kind of shoot apex organization found found in angiosperms, consisting of two sets of meristematic cells, namely an outer mantel  or cape-like layer(s) of cells (tunica) dividing only anticlinally, enclosing a core of meristematic cells (corpus) which divide both anticlinally and periclin'),(475,'Turgid','said of a cell that is fully expanded due to water filling up its vacuole.'),(476,'Tylose','a balloon-like enlargement of the membrane opposite a pit in a vessel element, or of the parenchyma cell beside the element, thereby obstructing the passageway of water in a dicot stem.'),(477,'Umbel','an inflorescence with florets arising as a cluster from the receptacle, their pedicels of the same length.'),(478,'Unicellular','consisting of a single cell.'),(479,'Vacuole','a single membrane bounded organelle that takes up most of the cell cavity in a living parenchyma cell and serves as a sink for waste products of metabolism.'),(480,'Vascular bundle','a strand of vascular tissue.'),(481,'Vascular cambium','one of the two lateral secondary meristems that gives rise to the secondary vascular tissues resulting in a tremendous increase in diameter of the plant axis.'),(482,'Vascular plant','plant with xylem and phloem.'),(483,'Vascular tissue','the complex water  and photosynthetic transporting tissues in tracheophytes consisting of xylem and phloem elements.'),(484,'Vein','the vascular tissue in a leaf or in any similarity flattened organ.'),(485,'Venation','pattern formed by veins in the leaf blade.'),(486,'Vessel','a series of vessel members joined end to end.'),(487,'Vessel element','component cell of the xylem tissue of angiosperm that is short, sclerenchymatous, with wide diameter, and with perforated end walls specialized for water transport. The vessel elements or members are joined into long continuous tubes called vessels.'),(488,'Vessel member','see Vessel element.'),(489,'Whorled','a type of leaf arrangement in which more than two leaves arise per node.'),(490,'Wings','the two narrow petals of an irregular flower that are located on each side of the standard.'),(491,'Wiry root','as applied to Cocos, this is a root system that has a wider diameter than fibrous roots.'),(492,'Wood','all tissues inner to the vascular cambium during secondary growth. In the early stage of secondary growth, this is composed of secondary xylem, primary xylem and pith, while in the latter stage, it is mostly made up of secondary xylem.'),(493,'Xanthophyll','a yellow carotenoid pigment found inside the chloroplast.'),(494,'Xeromorphic','pertaining  to structural features that enable a plant to inhabit arid or dry habitats.'),(495,'Xylem ray','one or a few linear series of parenchyma cells radiating from the center to outside of a stem or root transverse section  -its function is for radial transport and storage.'),(496,'Zygomorphic flower','one whose floral parts do not radiate from the center and so, a cut along only one plane yields halves that look alike. See Irregular flower.'),(497,'Zygote','the single diploid cell formed from the union of a sperm cell and an egg cell -the first cell of the sporophyte generation.');
/*!40000 ALTER TABLE `bot_journal` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `consumer`
--

DROP TABLE IF EXISTS `consumer`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `consumer` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `account_no` int(11) NOT NULL,
  `fullname` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `consumer_type` varchar(5) NOT NULL,
  `is_active` tinyint(1) NOT NULL,
  `is_coleasee` tinyint(1) NOT NULL,
  `is_employee` tinyint(1) NOT NULL,
  `has_bond_deposit` tinyint(1) NOT NULL,
  `date_added` date NOT NULL,
  `date_updated` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=63 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `consumer`
--

LOCK TABLES `consumer` WRITE;
/*!40000 ALTER TABLE `consumer` DISABLE KEYS */;
INSERT INTO `consumer` VALUES (2,100,'Juan dela Cruz','UPLB','RES',1,0,0,0,'2015-10-10','0000-00-00'),(3,2002,'YMCA DORM','ARCHIBALD R. WARD ST.','INS',1,0,0,1,'0000-00-00','2016-06-10'),(4,2202,'COUNTRY CLUBHOUSE','COLLEGE LAGUNA','INS',1,0,0,1,'0000-00-00','2016-05-10'),(5,2312,'PHIL.RICE RESEARCH  INSTITUTE','PILI DRIVE','INS',1,0,0,0,'0000-00-00','2016-09-06'),(6,2313,'OPEN UNIVERSITY #1','COLLEGE LAGUNA','INS',1,0,0,0,'0000-00-00','2014-03-17'),(7,0,'ACCI MENS DORM','UPLB CAMPUS','INS',1,0,0,0,'0000-00-00','0000-00-00'),(8,0,'PHIL CARABAO CENTER','UPLB CAMPUS','INS',1,0,0,0,'0000-00-00','0000-00-00'),(9,2335,'CEC SEED TECH. X40','ARCHIBALD R. WARD ST.','INS',1,0,0,0,'0000-00-00','2015-03-06'),(10,2356,'CEC LAUNDRY ANNEX','ARCHIBALD R. WARD ST.','INS',1,0,0,0,'0000-00-00','2015-04-28'),(11,2338,'FNP DORM. ANNEX','UPLB CAMPUS','INS',1,0,0,0,'0000-00-00','2015-03-06'),(12,2352,'FNP DORMITORY','UPLB CAMPUS','INS',1,0,0,0,'0000-00-00','2015-06-29'),(13,3043,'FORESTRY RES. HALL','UPLB CAMPUS','INS',1,0,0,0,'0000-00-00','2014-03-17'),(14,3053,'INTERNATIONAL HOUSE','UPLB CAMPUS','INS',1,0,0,0,'0000-00-00','2014-06-09'),(15,0,'MAQUILING RES. HALL','UPLB CAMPUS','INS',1,0,0,0,'0000-00-00','0000-00-00'),(16,3058,'MENS DORM 2&3','UPLB CAMPUS','INS',1,0,0,0,'0000-00-00','2014-05-26'),(17,3059,'MENS DORM 4&5','UPLB CAMPUS','INS',1,0,0,0,'0000-00-00','2014-05-26'),(18,0,'PHILSUGIN','UPLB CAMPUS','INS',1,0,0,0,'0000-00-00','0000-00-00'),(19,2355,'POST OFFICE','UPLB CAMPUS','INS',1,0,0,0,'0000-00-00','2015-03-06'),(20,3070,'SOCIAL GARDEN #3','C/O MS. MARINA CATIPON','INS',1,0,0,0,'0000-00-00','2014-06-09'),(21,3074,'NEW FOREHA RES. HALL','UPLB CAMPUS','INS',1,0,0,0,'0000-00-00','2014-06-09'),(22,3078,'SOCIAL GARDEN #1','C/O MS. MARINA CATIPON','INS',1,0,0,0,'0000-00-00','2014-06-09'),(23,1701,'SEARCA BUILDING','SEARCA COLLEGE LAGUNA','COM',1,0,0,0,'0000-00-00','2015-11-09'),(24,1703,'SEARCA DORMITORY','SEARCA COLLEGE LAGUNA','COM',1,0,0,0,'0000-00-00','2014-03-14'),(25,1705,'SEARCA GUESTHOUSE 1','SEARCA COLLEGE LAGUNA','COM',1,0,0,0,'0000-00-00','0000-00-00'),(26,1704,'SEARCA GUESTHOUSE 2','SEARCA COLLEGE LAGUNA','COM',1,0,0,0,'0000-00-00','0000-00-00'),(27,2001,'YMCA CANTEEN C/O LYDIA ALCANTARA','ARCHIBALD R. WARD ST.','COM',1,0,0,1,'0000-00-00','2016-06-10'),(28,2003,'YMCA FAMILY CIRCLE','ARCHIBALD R. WARD ST.','COM',1,0,0,1,'0000-00-00','2016-05-10'),(29,2204,'OFICIAL BEV.BIO-SCI. C/O BERT OFICIAL','RAMON M. MONDENODO AVE.-SU. BLDG.','COM',1,0,0,0,'0000-00-00','2015-05-09'),(30,2205,'PHIL. SEVEN CORP. C/O FRANCIS MEDINA','RAMON M. MONDONEDO AVE.','COM',1,0,0,0,'0000-00-00','2015-05-09'),(31,2207,'MAQUILING SCH.INCX40','VICTORIA M. ELA ST.','COM',1,0,0,1,'0000-00-00','2016-05-10'),(32,2302,'COLLEGE COOP STORE','ANDRES P. AGLIBUT AVE.','COM',1,0,0,1,'0000-00-00','2016-08-31'),(33,0,'FOUNDATION #2','COLLEGE LAGUNA','COM',1,0,0,0,'0000-00-00','0000-00-00'),(34,2308,'AL-QUIN FAMILY COMPUTER CAFE  YMCA  c/o Mr. Romulo Quintana','ARCHIBALD R. WARD ST.','COM',1,0,0,1,'0000-00-00','2016-05-10'),(35,2307,'TTA TESS FUD COUNTER','MATH BLDG C/O T. PANTASTICO','COM',1,0,0,0,'0000-00-00','2015-05-09'),(36,2311,'PHILHYBRID (X30) C/O ERLINDA RILLO','SCIENCE PARK','COM',1,0,0,0,'0000-00-00','2015-05-13'),(37,2314,'INTHAI TO GO','C/O MS. ABIGAIL CAMUS','COM',1,0,0,0,'0000-00-00','2015-11-25'),(38,2213,'BERRIS CUISINE #1','C/O Ms.Limnette Berris','COM',1,0,0,0,'0000-00-00','2015-05-09'),(39,2214,'LAGUNA WATER x20','Putho, College, Laguna','COM',1,0,0,0,'0000-00-00','2015-10-19'),(40,2215,'PREM COMP. CENTER','RAMON M. MONDENODO S.U.C/O Lyn Patacsil','COM',1,0,0,1,'0000-00-00','2016-05-10'),(41,2105,'LOLA PURING LAUNDRY','ARCHIVALD R. WARD ST. COLLEGE LAGUNA','COM',1,0,0,1,'0000-00-00','2016-05-10'),(42,2109,'YMCA OFFICE','ARCHIBALD R. WARD ST.','COM',1,0,0,0,'0000-00-00','2015-05-09'),(43,0,'CASAL ISAGANI','HSE. # 1  ACACIA ROAD','RES',0,0,0,0,'0000-00-00','2013-11-25'),(44,102,'JIMENA CARLA EDITH G.','HSE. # 2  ACACIA ROAD','RES',1,0,1,0,'0000-00-00','2016-04-21'),(45,103,'MASANGKAY JOSEPH S.','HSE. # 3  ACACIA ROAD','RES',1,0,0,0,'0000-00-00','2016-09-06'),(46,104,'TATLONGHARI ROSARIO','HSE. # 4  ACACIA ROAD','RES',1,0,1,0,'0000-00-00','2014-05-19'),(47,105,'GALVEZ HAYDE F.','HSE. # 6  ACACIA ROAD','RES',1,0,1,0,'0000-00-00','2016-11-15'),(48,106,'ACDA MENANDRO N.','HSE. # 8  ACACIA ROAD','RES',1,0,1,0,'0000-00-00','2015-05-20'),(49,107,'MAGNAYE YOLANDA M.','HSE. #10  ACACIA ROAD','RES',1,0,1,0,'0000-00-00','2016-11-15'),(50,108,'BO JOSEPHINE M.','HSE. #12  ACACIA ROAD','RES',1,0,1,0,'0000-00-00','2016-09-05'),(51,301,'TIBOR IRENE','HSE. #4  DAO ROAD','RES',1,0,1,0,'0000-00-00','2016-06-10'),(52,4141,'EVANGELISTA DANILO','HSE.#6  DONA AURORA ROAD','RES',1,0,0,0,'0000-00-00','2014-05-03'),(53,432,'LAURENA, ANTONIO C.','HSE.#15 DONA AURORA ROAD','RES',1,0,1,0,'0000-00-00','2015-05-20'),(54,4511,'DELA CRUZ RUBY','HSE.#37 DONA AURORA ROAD','RES',1,0,0,0,'0000-00-00','2016-07-19'),(55,505,'BALDRIAS, LOINDA R.','HSE.#17 DUHAT ROAD','RES',1,0,1,0,'0000-00-00','2015-05-20'),(56,601,'MACANDOG, DAMASA M.','HSE.#22 GUIJO ROAD','RES',1,0,1,0,'0000-00-00','2016-09-21'),(57,602,'TALAG, RAPHAEL D.','HSE.#24 GUIJO ROAD','RES',1,0,1,0,'0000-00-00','2017-01-10'),(58,705,'BAUTISTA, LORNA V.','HSE.#5  HELICONIA ROAD','RES',1,0,0,0,'0000-00-00','2016-09-05'),(59,809,'SALUDES, RONALDO B.','APT.20B IPIL ROAD','RES',1,0,1,0,'0000-00-00','2016-09-05'),(60,813,'QUIMBO, JOSEPHINE DJ.','APT.22B IPIL ROAD','RES',1,0,1,0,'0000-00-00','2015-05-20'),(61,818,'MACAPINLAC ARLYN','HSE.#27 IPIL ROAD','RES',1,0,0,0,'0000-00-00','2014-05-05'),(62,901,'MAIQUEZ, REAGAN R.','HSE.#1  IPIL ROAD','RES',1,0,1,0,'0000-00-00','2017-04-22');
/*!40000 ALTER TABLE `consumer` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `consumer_balance`
--

DROP TABLE IF EXISTS `consumer_balance`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `consumer_balance` (
  `balance_id` int(11) NOT NULL AUTO_INCREMENT,
  `account_no` int(11) NOT NULL,
  `month_of_balance` int(11) NOT NULL,
  `year_of_balance` int(11) NOT NULL,
  `balance_amount` int(11) NOT NULL,
  PRIMARY KEY (`balance_id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `consumer_balance`
--

LOCK TABLES `consumer_balance` WRITE;
/*!40000 ALTER TABLE `consumer_balance` DISABLE KEYS */;
INSERT INTO `consumer_balance` VALUES (1,0,0,0,1000),(2,2002,1,2015,150),(3,2312,1,2015,-100),(4,2001,1,2015,783),(5,103,1,2015,3216),(6,105,1,2015,-1762),(7,107,1,2015,-244),(8,108,1,2015,-353),(9,301,1,2015,258),(10,601,1,2015,-644),(11,602,1,2015,3904),(12,705,1,2015,240),(13,809,1,2015,-199),(14,901,1,2015,820);
/*!40000 ALTER TABLE `consumer_balance` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `consumer_bond_deposit`
--

DROP TABLE IF EXISTS `consumer_bond_deposit`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `consumer_bond_deposit` (
  `bond_id` int(11) NOT NULL AUTO_INCREMENT,
  `account_no` int(11) NOT NULL,
  `bond_amount` int(11) NOT NULL,
  `is_returned` tinyint(1) NOT NULL,
  `date_recorded` date NOT NULL,
  `date_returned` date DEFAULT NULL,
  `returned_by` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`bond_id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `consumer_bond_deposit`
--

LOCK TABLES `consumer_bond_deposit` WRITE;
/*!40000 ALTER TABLE `consumer_bond_deposit` DISABLE KEYS */;
INSERT INTO `consumer_bond_deposit` VALUES (1,2002,20000,0,'0000-00-00',NULL,NULL),(2,2202,10000,0,'0000-00-00',NULL,NULL),(3,2001,10000,0,'0000-00-00',NULL,NULL),(4,2003,10000,0,'0000-00-00',NULL,NULL),(5,2207,20000,0,'0000-00-00',NULL,NULL),(6,2302,10000,0,'0000-00-00',NULL,NULL),(7,2308,5000,0,'0000-00-00',NULL,NULL),(8,2215,5000,0,'0000-00-00',NULL,NULL),(9,2105,10000,0,'0000-00-00',NULL,NULL);
/*!40000 ALTER TABLE `consumer_bond_deposit` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `consumer_employee`
--

DROP TABLE IF EXISTS `consumer_employee`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `consumer_employee` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `employee_no` int(11) NOT NULL,
  `account_no` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `consumer_employee`
--

LOCK TABLES `consumer_employee` WRITE;
/*!40000 ALTER TABLE `consumer_employee` DISABLE KEYS */;
INSERT INTO `consumer_employee` VALUES (1,102005683,102),(2,201302986,104),(3,72002418,105),(4,11004033,106),(5,133232077,107),(6,22005563,108),(7,203312343,301),(8,122004055,432),(9,21031561,505),(10,132006091,601),(11,203311761,602),(12,191004103,809),(13,171000375,813),(14,0,901);
/*!40000 ALTER TABLE `consumer_employee` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `diversityQuizAnswers`
--

DROP TABLE IF EXISTS `diversityQuizAnswers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `diversityQuizAnswers` (
  `aid` int(5) NOT NULL AUTO_INCREMENT,
  `answer` varchar(100) DEFAULT NULL,
  `ans_qid` int(5) DEFAULT NULL,
  PRIMARY KEY (`aid`)
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `diversityQuizAnswers`
--

LOCK TABLES `diversityQuizAnswers` WRITE;
/*!40000 ALTER TABLE `diversityQuizAnswers` DISABLE KEYS */;
INSERT INTO `diversityQuizAnswers` VALUES (1,'chlorophyta',1),(2,'magnoliophyta',2),(3,'bryophytes',3),(4,'fiddlehead',4),(5,'crozier',4),(6,'seeds',5),(7,'presence of seeds',5),(8,'cone',6),(9,'seeds',6),(10,'lycophyta',7),(11,'heterosporous',8),(12,'prothallus',9),(13,'sporangium',10),(14,'sporangia',10),(15,'synangium',11),(16,'synangia',11),(17,'angiosperms',12),(18,'flowering plants',12),(19,'magnoliophyta',12),(20,'megasporogenesis',13),(21,'meiosis',13),(22,'microgametophyte',14),(23,'pollen',14),(24,'size',15),(25,'height of the plant',15),(26,'F',16),(27,'FALSE',16),(28,'arthrostele',17),(29,'sorus',18),(30,'sori',18),(31,'diplohaplontic life cycle',19),(32,'psilophyta',20),(33,'liliopsida',21),(34,'arecaceae',22),(35,'cucurbitaceae',23),(36,'cycadophyta',24),(37,'foot',25);
/*!40000 ALTER TABLE `diversityQuizAnswers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `diversityQuizQuestions`
--

DROP TABLE IF EXISTS `diversityQuizQuestions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `diversityQuizQuestions` (
  `qid` int(5) NOT NULL AUTO_INCREMENT,
  `question` text,
  PRIMARY KEY (`qid`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `diversityQuizQuestions`
--

LOCK TABLES `diversityQuizQuestions` WRITE;
/*!40000 ALTER TABLE `diversityQuizQuestions` DISABLE KEYS */;
INSERT INTO `diversityQuizQuestions` VALUES (1,'division of the organisms known as the most probable ancestors of plants\n'),(2,'the flowering plants belong to what division?'),(3,'this group of plants do not have any vacular tissues'),(4,'term for the coiled developing leaf of ferns'),(5,'distinct feature of spermatophytes compared with the other plant groups'),(6,'reproductive structure of a conifer'),(7,'division where clubmosses belong to'),(8,'type of spores exhibited by Selaginella'),(9,'term for the fern gametophyte'),(10,'a structure that acts as spore case'),(11,'term for fused sporangia'),(12,'group of plants that exhibit double fertilization'),(13,'the process known to occur to create megaspores'),(14,'a microspore undergoes mitosis to create what structure?'),(15,'morphological restriction for non-vascular plants?'),(16,'T or F. The gametophyte stage is the dominant stage for ferns.'),(17,'type of stele exhibited by horsetails'),(18,'reproductive structure for ferns'),(19,'type of life cycle exhibited by ferns'),(20,'division of vascular plants known to have no true roots or leaves'),(21,'class of monocots'),(22,'family where palms belong to'),(23,'family where squash belongs to'),(24,'division where cycads belong to'),(25,'structure that connects the sporophyte to the gametophyte in mosses');
/*!40000 ALTER TABLE `diversityQuizQuestions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `diversityquiz_scores`
--

DROP TABLE IF EXISTS `diversityquiz_scores`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `diversityquiz_scores` (
  `uid` int(5) NOT NULL,
  `quizNum` int(5) DEFAULT NULL,
  `score` int(5) DEFAULT NULL,
  PRIMARY KEY (`uid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `diversityquiz_scores`
--

LOCK TABLES `diversityquiz_scores` WRITE;
/*!40000 ALTER TABLE `diversityquiz_scores` DISABLE KEYS */;
INSERT INTO `diversityquiz_scores` VALUES (10003,NULL,1),(10004,NULL,NULL),(10005,NULL,NULL),(10006,NULL,NULL),(10007,NULL,NULL),(10009,NULL,NULL);
/*!40000 ALTER TABLE `diversityquiz_scores` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `expeditionAnswers`
--

DROP TABLE IF EXISTS `expeditionAnswers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `expeditionAnswers` (
  `aid` int(5) NOT NULL AUTO_INCREMENT,
  `answer` varchar(70) DEFAULT NULL,
  `ans_eid` int(5) DEFAULT NULL,
  PRIMARY KEY (`aid`)
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `expeditionAnswers`
--

LOCK TABLES `expeditionAnswers` WRITE;
/*!40000 ALTER TABLE `expeditionAnswers` DISABLE KEYS */;
INSERT INTO `expeditionAnswers` VALUES (1,'bayabas',1),(2,'lagundi',1),(3,'garlic',1),(4,'yerbaBuena',1),(5,'ampalaya',1),(6,'pansitPansitan',1),(7,'periwinkle',1),(8,'zingiber',1),(9,'akapulko',1),(10,'equisetum',1),(11,'papaya',2),(12,'kalamansi',2),(13,'aloe',2),(14,'rose',2),(15,'cucumber',2),(16,'coconut',3),(17,'casuarina',3),(18,'pinus',3),(19,'gabi',4),(20,'carrot',4),(21,'camote',4),(22,'potato',4),(23,'corn',4),(24,'rice',4),(25,'squash',4),(26,'eggplant',4),(27,'patola',4),(28,'upo',4),(29,'okra',4),(30,'mango',4),(31,'coffee',4),(32,'peanuts',4),(33,'tomato',4),(34,'pineapple',4),(35,'sesbaniaGrandiflora',4),(36,'ixoraCoccinea',4),(37,'helianthusAnnus',4),(38,'hibiscusSabdariffa',5),(39,'clitoreaPurpurea',5),(40,'mirabilisJalapa',5);
/*!40000 ALTER TABLE `expeditionAnswers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `expeditionQA`
--

DROP TABLE IF EXISTS `expeditionQA`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `expeditionQA` (
  `eid` int(5) NOT NULL AUTO_INCREMENT,
  `task` text,
  PRIMARY KEY (`eid`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `expeditionQA`
--

LOCK TABLES `expeditionQA` WRITE;
/*!40000 ALTER TABLE `expeditionQA` DISABLE KEYS */;
INSERT INTO `expeditionQA` VALUES (1,'The King was wounded badly in battle, along with his comrades. A number of plants, around ten, are needed to be used for their healing and proper recovery. These plants belong to different families scattered all throughout the kingdom, housed in grasslands and tropical rainforests. Its uses range from antiseptics, antibacterial, anthelmintic, and muscle relaxants.'),(2,'The queen is well-known for her beauty and youth, and would like you to deliver to her five plants that would contribute to her beautification, especially for her facand skin. She would like to make her skin softer, more hydrated, and free from blemishes, while at the same time she would like her eyes to be relaxed.'),(3,'The palace, since it has been worn down with time, needs reconstruction and repairs. The foreman asks your help in locating good quality materials for the restoration of the infrastructures. The foreman needs some good quality wood, such as softwood and hardwood, suited for different structures needed to be done.'),(4,'Following the successful harvest, an extravagant feast will be held at the palace as a way of thanking the gods. The farmers would like you to help them choose which crops would be best suited for the feast. They would like the produce presented be varied: some are crops (6), others are vegetables (4), and others are fruits (5). Flowers (3) can also be added to the mix as additional decorations to make the display more lively.'),(5,'The Prince has announced that he will be married to a commoner, giving up being in line for the crown. Since his parents were touched by his gesture, a ball will be held for him and his fiancée. The Prince asks you to recommend to him three (3) plants where red and blue dyes can be extracted from as he needs it for his outfit.');
/*!40000 ALTER TABLE `expeditionQA` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `expedition_add_points`
--

DROP TABLE IF EXISTS `expedition_add_points`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `expedition_add_points` (
  `apid` int(5) NOT NULL AUTO_INCREMENT,
  `question` text,
  `answer` text,
  `expeditionId` int(5) DEFAULT NULL,
  PRIMARY KEY (`apid`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `expedition_add_points`
--

LOCK TABLES `expedition_add_points` WRITE;
/*!40000 ALTER TABLE `expedition_add_points` DISABLE KEYS */;
INSERT INTO `expedition_add_points` VALUES (1,'What is the scientific name of \'bayabas\'?','Psidium guajava',1),(2,'What plant organ is used in \'Vitex negundo (lagundi)\'?','leaf',1),(3,'Equisetum is a lower vascular plant used as a _______.','diuretic',1),(4,'What is the term for the modified stem used for medicinal purposes in Zingiber species?','rhizome',1),(5,'In which plant family does Mentha arvensis (yerba buena) belong?','lamiaceae',1),(6,'Which plant is suited as an anthelmintic, or for deworming purposes?','akapulko',1),(7,'What part of Carica papaya (papaya) is incorporated into soaps and lotions to soften the skin?','fruit',2),(8,'What kind of acid is found in Citrus fruits, such as kalamansi?','citric acid',2),(9,'In what plant family does the cucumber belong to?','cucurbitaceae',2),(10,'The mucilage used for healing burns and softening skin is found in the ______ of Aloe.','leaf',2),(11,'The rose, usually incorporated in perfume scents, belong to which plant family?','rosaceae',2),(12,'Which among the coconut, casuarina and pinus is not a gynosperm?','coconut',3),(13,'What kind of wood can be obtained from gymnosperms?','softwood',3),(14,'What plant family does coconut belong to?','arecaceae',3),(15,'What is the scientific name of sunflower?','helianthus annus',4),(16,'How are gabi, carrot, and potato different?','gabi and carrot are modified roots while potato is a modified stem',4),(17,'What kind of fruit is pineapple?','multiple',4),(18,'Are corn and rice monocots or dicots?','monocots',4),(19,'What kind of fruit is the eggplant?','berry',4),(20,'What family does okrra belong to?','malvaceae',4),(21,'What is the inflorescence of Ixora coccinea (santan) ?','cyme',4),(22,'What color can be obtained from roselle?','red',5),(23,'What plant part is the source of the blue-violet color obtained from Clitorea?','flower',5),(24,'What plant gives off maroon colors, among Hibiscus sabdariffa, Clitorea purporea and Mirabilis jalapa?','mirabilis jalapa',5);
/*!40000 ALTER TABLE `expedition_add_points` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `herbmeet_scores`
--

DROP TABLE IF EXISTS `herbmeet_scores`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `herbmeet_scores` (
  `uid` int(5) NOT NULL,
  `quizNum` int(5) DEFAULT NULL,
  `score` int(5) DEFAULT NULL,
  PRIMARY KEY (`uid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `herbmeet_scores`
--

LOCK TABLES `herbmeet_scores` WRITE;
/*!40000 ALTER TABLE `herbmeet_scores` DISABLE KEYS */;
INSERT INTO `herbmeet_scores` VALUES (10003,NULL,2),(10004,NULL,NULL),(10005,NULL,NULL),(10006,NULL,NULL),(10007,NULL,0),(10009,NULL,0);
/*!40000 ALTER TABLE `herbmeet_scores` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `herbologyMeetAnswers`
--

DROP TABLE IF EXISTS `herbologyMeetAnswers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `herbologyMeetAnswers` (
  `aid` int(5) NOT NULL AUTO_INCREMENT,
  `answer` varchar(50) NOT NULL,
  `ans_qid` int(5) NOT NULL,
  PRIMARY KEY (`aid`),
  KEY `ans_qid` (`ans_qid`)
) ENGINE=InnoDB AUTO_INCREMENT=90 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `herbologyMeetAnswers`
--

LOCK TABLES `herbologyMeetAnswers` WRITE;
/*!40000 ALTER TABLE `herbologyMeetAnswers` DISABLE KEYS */;
INSERT INTO `herbologyMeetAnswers` VALUES (1,'spores',1),(2,'prothallus',2),(3,'endosperm',3),(4,'F',4),(5,'T',5),(6,'F',6),(7,'gametophyte stage',7),(8,'sorus',8),(9,'sori',8),(10,'Angiosperm Phylogeny Group',9),(11,'F',10),(12,'strobilus',11),(13,'strobili',11),(14,'synangium',11),(15,'synangia',11),(16,'water',12),(17,'moisture',12),(18,'Monophyletic group',13),(19,'Cyanobacteria',14),(20,'Chloroxybacteria',14),(21,'low lying plants',15),(22,'cannot grow taller',15),(23,'needle-like leaves',16),(24,'flowers',17),(25,'fruits',17),(26,'clade',18),(27,'T',19),(28,'crozier',20),(29,'fiddle head',20),(30,'circinate vernation',21),(31,'heterosporous',22),(32,'homosporous',23),(33,'c',24),(34,'taproot system',25),(35,'false',26),(36,'ground meristem',27),(37,'a',28),(38,'Casparian strip',29),(39,'TRUE',30),(40,'b',31),(41,'Phloem',32),(42,'pneumatophores',33),(43,'b',34),(44,'Plumule',35),(45,'b',36),(46,'FALSE',37),(47,'c) Photosynthesis',38),(48,'FALSE',39),(49,'nodes',40),(50,'protection',41),(51,'a',42),(52,'TRUE',43),(53,'photosynthesis',44),(54,'b',45),(55,'cuticle',46),(56,'TRUE',47),(57,'b',48),(58,'FALSE',49),(59,'c',50),(60,'TRUE',51),(61,'c',52),(62,'trichomes',53),(63,'FALSE',54),(64,'TRUE',55),(65,'C',56),(66,'sporogenesis',57),(67,'gametogenesis',58),(68,'pollination',59),(69,'double fertilization',60),(70,'A',61),(71,'FALSE',62),(72,'ovary',63),(73,'TRUE',64),(74,'zygomorphic',65),(75,'superior',66),(76,'B',67),(77,'Head',68),(78,'spike',69),(79,'strobilus',70),(80,'sorus',71),(81,'pollen grains',72),(82,'embryo sac',73),(83,'B',74),(84,'samara',75),(85,'capsule',76),(86,'hesperidium',77),(87,'prothallus',78),(88,'flower',79),(89,'capitulum',68);
/*!40000 ALTER TABLE `herbologyMeetAnswers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `herbologyMeetQA`
--

DROP TABLE IF EXISTS `herbologyMeetQA`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `herbologyMeetQA` (
  `qid` int(5) NOT NULL AUTO_INCREMENT,
  `question` varchar(500) DEFAULT NULL,
  PRIMARY KEY (`qid`)
) ENGINE=InnoDB AUTO_INCREMENT=80 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `herbologyMeetQA`
--

LOCK TABLES `herbologyMeetQA` WRITE;
/*!40000 ALTER TABLE `herbologyMeetQA` DISABLE KEYS */;
INSERT INTO `herbologyMeetQA` VALUES (1,'Structure released by fern allies to reproduce?'),(2,'Terms for the fern gametophyte?'),(3,'In double fertilization, union of sperm and polar nuclei produces what structure?'),(4,'T/F Ferns are capable of pollination.'),(5,'T/F Gymnosperms take time to develop young plants'),(6,'T/F Bryophytes are capable of growing tall and bushy.'),(7,'Dominant stage in a moss’ life cycle?'),(8,'Structures that contain spores in fern plants?'),(9,'what does APG stand for? '),(10,'T/F APG classification is based solely on the molecular characteristics of the different angiosperm '),(11,'Spores in fern allies are organized in specialized structures like?'),(12,'Requirement for fetilization to occur in bryophytes?'),(13,'Evolutionary relationship that signifies that the organisms have one common ancestor?'),(14,'Considered as the prokaryotic ancestors of plants? '),(15,'Morphological limitation for plants without vascular tissues?'),(16,'Morphological adaptation of gymnosperms to lessen water loss from their leaves?'),(17,'Morphological advancement of angiosperms that allowed them to dominate land?'),(18,'Term used in APG classification for a group of plants that are believed to have evolved from one common ancestor?'),(19,'T/F Ferns have a dominant sporophyte stage in its life cycle.'),(20,'Another term for the developing young frond of ferns?'),(21,'Term for the coiling of the young developing frond/ leaf as observed in ferns and some gymnosperms?'),(22,'Descriptive term for a plant with two types of spores?'),(23,'Descriptive term for a plant with one type of spores?'),(24,'The embryonic root is called the: a) root cap, b) primary root, c) radicle, d) root hairs.'),(25,'Monocots: fibrous root system; Dicots: (?)'),(26,'TRUE or FALSE. The three regions in the root apical meristem are the region of active cell division, region of elongation, and region of expansion.'),(27,'In the roots, the Protoderm: epidermis while the (?):pith'),(28,'The two main functions of the root are: a) anchorage and absorption, b) filtering and drinking, c) anchorage and storage, d) support and photosynthesis.'),(29,'The (?) is the waxy strip in the endodermis filtering the water and minerals entering the stele.'),(30,'TRUE or FALSE. The root hairs are for increasing the surface area of absorption of the root.'),(31,'During metamorphosed structures for storage, the a) epidermis, b) cortex, c) xylem expands in size to accommodate the stored food.'),(32,'Xylem:water and minerals; (?): food and photosynthates'),(33,'Mangroves have metamorphosed roots known as (?) that aid in respiration and gas exchange'),(34,'In older plants, the shoot apical meristem organization is a) tunica-corpus, b) single cell apical initial.'),(35,'The embryonic shoot is known as the (?)'),(36,'Potatoes are tubers which store food and can be used for asexual reproduction. Tubers are metamorphosed a) leaves, b) stem, c) roots.'),(37,'TRUE or FALSE. Monocots can undergo secondary growth as the ground meristem gives additional layers upon maturity.'),(38,'Plants with green stems, such as cacti, use its stems for a) protection, b) camoflauge, c) photosynthesis'),(39,'TRUE or FALSE. The pericycle and endodermis are present in stems.'),(40,'The (?) are the points where leaves arise from the stems.'),(41,'Citrus plants have spiky projections from its stems used for (?)'),(42,'The secondary xylem and phloem come from the a) vascular cambium, b) interfascicular cambium, c) cork cambium which causes the expansion of the width for secondary growth of dicots.'),(43,'TRUE or FALSE. Lenticels are breaks in the periderm that aid in transpiration.'),(44,'Leaves are green in order to accomplish its task of (?)'),(45,'Which is not a primary function of the leaf? A) transpiration b) floatation c) gas exchange'),(46,'The (?) is usually present on the epidermis of leaves to minimize water loss.'),(47,'TRUE or FALSE. The stomata is the opening in leaves where carbon dioxide enters and oxygen exits.'),(48,'The a) palisade mesophyll b) spongy mesophyll contains the intercellular spaces accomodating the gases entering and leaving the leaf.'),(49,'TRUE or FALSE. Monocots have distinct mesophyll layers that are seen in the differences in the upper and lower sides of its leaves.'),(50,'Onion bulbs are an example of a metamorphosed leaf used for a) carnivory, b) protection c) storage'),(51,'TRUE or FALSE. The arrangement of leaves or phyllotaxy can be used for identification and grouping of plants.'),(52,'Pitcher plants use its leaves to catch prey, a good example of metamorphosed leaf for a) protection b) support c) carnivory'),(53,'Hair-like protrusions used in maintaining the ideal conditions for minimal water loss for sunken stomata are called (?)'),(54,'True or False: Sexual reproduction is uniparental and involves gametes.'),(55,'True or False: Asexual reproduction is uniparental and does not involve gametes.'),(56,'Plants undergo what type of sexual life cycle? A. haplontic B. Diplontic C. Diplo-haplontic'),(57,'Process that involves spore production through meiosis?'),(58,'Process that involves gametes production through mitosis?'),(59,'The transfer of pollen grains from the anther to the stigma is known as?'),(60,'The union of sperm cell and egg cell producing zygote simultaneous with the union of another sperm cell and polar nuclei producing endosperm is known as? '),(61,'The male gametophyte containing the sperm cells of liverworts is known as? A. antheridium B. archegonium C. pollen grain'),(62,'True or False: Cycads, conifers and angiosperms undergo pollination.'),(63,'stamen: anther, pistil: (?)'),(64,'True or False: All complete flowers are perfect but not all perfect flowers are complete.'),(65,'Flowers having lip or labellum exhibit what type of floral symmetry?'),(66,'Ovary position of flowers having their floral parts attached below the ovary.'),(67,'Type of placentation wherein the ovules are attached at the ovary/fruit wall. A. axile B. parietal C. basal'),(68,'Type of inflorescence exhibited by members of Asteraceae.'),(69,'Type of inflorescence exhibited by members of Piperaceae.'),(70,'Reproductive structure of most of the conifers.'),(71,'Reproductive structure of ferns'),(72,'Male gametophyte of angiosperms'),(73,'Female gametophyte of angiosperms'),(74,'Fruit type having fleshy pericarp. A. pepo B. berry C. legume'),(75,'Dry indehiscent fruit having papery appendage or wings'),(76,'Dry dehiscent fruit splits open in many parts'),(77,'Fruit type of citruses'),(78,'Heart-shaped gametophyte of ferns'),(79,'Structure contributed to the dominance of angiosperms on land. ');
/*!40000 ALTER TABLE `herbologyMeetQA` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `leavesQuizAnswers`
--

DROP TABLE IF EXISTS `leavesQuizAnswers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `leavesQuizAnswers` (
  `aid` int(5) NOT NULL AUTO_INCREMENT,
  `answer` varchar(100) DEFAULT NULL,
  `ans_qid` int(5) DEFAULT NULL,
  PRIMARY KEY (`aid`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `leavesQuizAnswers`
--

LOCK TABLES `leavesQuizAnswers` WRITE;
/*!40000 ALTER TABLE `leavesQuizAnswers` DISABLE KEYS */;
INSERT INTO `leavesQuizAnswers` VALUES (1,'netted',1),(2,'Reticulate',1),(3,'Parallel',2),(4,'Auricle',3),(5,'dorsiventral',4),(6,'isobilateral',5),(7,'phyllotaxy',6),(8,'chlorenchyma',7),(9,'aerenchyma',8),(10,'leaf sheath',9),(11,'alternate',10),(12,'whorled',11),(13,'cuticle',12),(14,'amphistomatic',13),(15,'FALSE',14),(16,'stomatal crypt',15),(17,'bulliform cells',16),(18,'motor cells',16),(19,'protection',17),(20,'trichomes',18),(21,'TRUE',19),(22,'blade',20),(23,'lamina',20),(24,'endodermis',21),(25,'temporal',22),(26,'bundle sheath cells',23),(27,'RuBISCO',24),(28,'Ribulose-1,5-bisphosphate carboxylase',24),(29,'oxygenase',24),(30,'PEPCase',25),(31,'PEP carboxylase',25),(32,'Phosphoenol pyruvate carboxylase',25);
/*!40000 ALTER TABLE `leavesQuizAnswers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `leavesQuizQuestions`
--

DROP TABLE IF EXISTS `leavesQuizQuestions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `leavesQuizQuestions` (
  `qid` int(5) NOT NULL AUTO_INCREMENT,
  `question` text,
  PRIMARY KEY (`qid`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `leavesQuizQuestions`
--

LOCK TABLES `leavesQuizQuestions` WRITE;
/*!40000 ALTER TABLE `leavesQuizQuestions` DISABLE KEYS */;
INSERT INTO `leavesQuizQuestions` VALUES (1,'What is the venation pattern of a dicot leaf?'),(2,'What is the venation pattern of a monocot leaf?'),(3,'What is the ear-like structure found at the base of monocot leaves that function for support?'),(4,'Since the dicot leaf has different abaxial and adaxial sides, the leaf symmetry of dicots is known as '),(5,'Since the monocot leaf has a uniform appearance in its adaxial and abaxial sides, its leaf symmetry is referred to as'),(6,'The particular arrangement of leaves on the nodes of the stem is referred to as'),(7,'In the mesophyll layer of dicots, this tissue is responsible for photosynthesis as it contains chloroplasts. '),(8,'Usually positioned above the stomata, this tissue is responsible for the exchange of gases as it contains large intercellular spaces.'),(9,'Instead of a petiole in dicots, monocots contain this to indicate the nodes.'),(10,'The type of phyllotaxy wherein one leaf arises per node.'),(11,'The type of phyllotaxy wherein three or more leaves arise at a single node.'),(12,'One way of conserving water is through the presence of a waxy layer on top of the epidermis, called –-.'),(13,'Stomata in monocots are usually found on both the upper and lower sides of the leaf. This stomatal arrangement is referred to as '),(14,'TRUE/FALSE. Monocots have distinct palisade and spongy mesophyll layers.'),(15,'Dips in the epidermis where stomata are hidden in order to protect them from changing temperatures that may promote water loss are known as ---'),(16,'In monocots, certain cells are larger and inflated than the ordinary epidermal cell when filled with water to promote leaf expansion and increase in photosyntetic surface area. Drought causes the cells to lose water and promote leaf rolling to conserve water. These cells are called ---'),(17,'Some plants, such as gymnosperrms, contain resin ducts that store resin, which serves for ---'),(18,'Hair-like structures found on the entrances of stomata that help lessen water loss are known as ---'),(19,'TRUE/FALSE. Pinus species (pines) contain the hypodermis, a sclerified tissue that serves to prevent water loss.'),(20,'The whole wide expanse of the leaf body is known as ---'),(21,'The –- is a ring of parenchymal tissue that contains suberin, a waxy substance that helps in preventing water loss.'),(22,'CAM plants have a carbon-concentrating strategy in order to utilize carbon more efficiently than C3 plants. It employs –- separation, wherein the carbon dioxide is fixed the Calvin Cycle during the night when the stomata are closed.'),(23,'C4 plants employ spatial separation, where it uses separate locations to concentrate carbon first before being transferred to the cells undergoing carbon fixation, hereby minimizing photorespiration. What group of cells is responsible for concentrating the carbon dioxide before transferring it to the mesophyll?'),(24,'What is the main enzyme involved in the Calvin Cycle?'),(25,'What is the enzyme present in C4 and CAM plants that fixes carbon dioxide to PEP first to avoid the occurrence of photorespiration?');
/*!40000 ALTER TABLE `leavesQuizQuestions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `leavesquiz_scores`
--

DROP TABLE IF EXISTS `leavesquiz_scores`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `leavesquiz_scores` (
  `uid` int(5) NOT NULL,
  `quizNum` int(5) DEFAULT NULL,
  `score` int(5) DEFAULT NULL,
  PRIMARY KEY (`uid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `leavesquiz_scores`
--

LOCK TABLES `leavesquiz_scores` WRITE;
/*!40000 ALTER TABLE `leavesquiz_scores` DISABLE KEYS */;
INSERT INTO `leavesquiz_scores` VALUES (10003,NULL,3),(10004,NULL,NULL),(10005,NULL,NULL),(10006,NULL,NULL),(10007,NULL,NULL),(10009,NULL,NULL);
/*!40000 ALTER TABLE `leavesquiz_scores` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pending_section_request`
--

DROP TABLE IF EXISTS `pending_section_request`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pending_section_request` (
  `requestid` int(5) NOT NULL AUTO_INCREMENT,
  `sectionid` int(3) DEFAULT NULL,
  `userid` int(5) DEFAULT NULL,
  PRIMARY KEY (`requestid`),
  KEY `psr_sectionid_fk` (`sectionid`),
  KEY `psr_userid_fk` (`userid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pending_section_request`
--

LOCK TABLES `pending_section_request` WRITE;
/*!40000 ALTER TABLE `pending_section_request` DISABLE KEYS */;
/*!40000 ALTER TABLE `pending_section_request` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `reproductionQuizAnswers`
--

DROP TABLE IF EXISTS `reproductionQuizAnswers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `reproductionQuizAnswers` (
  `aid` int(5) NOT NULL AUTO_INCREMENT,
  `answer` varchar(100) DEFAULT NULL,
  `ans_qid` int(5) DEFAULT NULL,
  PRIMARY KEY (`aid`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `reproductionQuizAnswers`
--

LOCK TABLES `reproductionQuizAnswers` WRITE;
/*!40000 ALTER TABLE `reproductionQuizAnswers` DISABLE KEYS */;
INSERT INTO `reproductionQuizAnswers` VALUES (1,'sexual',1),(2,'gametophyte',2),(3,'diplo-haplontic',3),(4,'megasporogenesis',4),(5,'microgametogenesis',5),(6,'stamen',6),(7,'endosperm',7),(8,'capsule',8),(9,'wind',9),(10,'ovary',10),(11,'complete',11),(12,'actinomorphic',12),(13,'gamopetalous',13),(14,'endocarp',14),(15,'umbel',15),(16,'inflorescence',16),(17,'heterospores',17),(18,'sorus',18),(19,'pollen grains',19),(20,'haustorium',20),(21,'dehiscent',21),(22,'B',22),(23,'aggregate',23),(24,'A',24),(25,'prothallus',25);
/*!40000 ALTER TABLE `reproductionQuizAnswers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `reproductionQuizQuestions`
--

DROP TABLE IF EXISTS `reproductionQuizQuestions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `reproductionQuizQuestions` (
  `qid` int(5) NOT NULL AUTO_INCREMENT,
  `question` text,
  PRIMARY KEY (`qid`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `reproductionQuizQuestions`
--

LOCK TABLES `reproductionQuizQuestions` WRITE;
/*!40000 ALTER TABLE `reproductionQuizQuestions` DISABLE KEYS */;
INSERT INTO `reproductionQuizQuestions` VALUES (1,'Mode of plant reproduction which is biparental and involves gametes'),(2,'Dominant stage of mosses'),(3,'Type of sexual life cycle of plants'),(4,'Production of female spores'),(5,'Production of male gametes'),(6,'Male part of the flower'),(7,'Triploid tructure produced after the union of one sperm nuclei and two polar nuclei'),(8,'Reproductive structure of liverworts, hornworts, and mosses producing spores'),(9,'Mode of pollination of conifers'),(10,'Pistil is composed of stigma, style, and ---'),(11,'Flowers having all floral whorls can be described as?'),(12,'Flowers having petals of the same size and color can be described as?'),(13,'Flowers having fused petals can be described as?'),(14,'Fruit is composed of exocarp, mesocarp, and ---'),(15,'Type of inflorescence having same length of pedicels and arising from a common cental point'),(16,'Cluster of florets is known as?'),(17,'Type of spores produced by gymnosperms and angiosperms'),(18,'Cluster of sporangia in ferns'),(19,'Trinucleated gametophyte of seeded-plants'),(20,'Other term for the cotyledon of coconut'),(21,'Fruit that splits open upon maturity'),(22,'Fruit type having hard and stony endocarp. A. berry B. drupe C. pome'),(23,'Fruit derived from several fused ovaries of a simple flower'),(24,'Type of placentation wherein the ovules are attached at the central axis of the ovary. A. axile B. parietal C. basal'),(25,'Heart-shaped gametophyte of ferns');
/*!40000 ALTER TABLE `reproductionQuizQuestions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `reproquiz_scores`
--

DROP TABLE IF EXISTS `reproquiz_scores`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `reproquiz_scores` (
  `uid` int(5) NOT NULL,
  `quizNum` int(5) DEFAULT NULL,
  `score` int(5) DEFAULT NULL,
  PRIMARY KEY (`uid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `reproquiz_scores`
--

LOCK TABLES `reproquiz_scores` WRITE;
/*!40000 ALTER TABLE `reproquiz_scores` DISABLE KEYS */;
INSERT INTO `reproquiz_scores` VALUES (10003,NULL,4),(10004,NULL,NULL),(10005,NULL,NULL),(10006,NULL,NULL),(10007,NULL,NULL),(10009,NULL,NULL);
/*!40000 ALTER TABLE `reproquiz_scores` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `role`
--

DROP TABLE IF EXISTS `role`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `role` (
  `id` int(1) NOT NULL,
  `role_desc` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `role`
--

LOCK TABLES `role` WRITE;
/*!40000 ALTER TABLE `role` DISABLE KEYS */;
INSERT INTO `role` VALUES (0,'Super Admin'),(1,'Admin'),(2,'Normal User');
/*!40000 ALTER TABLE `role` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `rootQuizAnswers`
--

DROP TABLE IF EXISTS `rootQuizAnswers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `rootQuizAnswers` (
  `aid` int(5) NOT NULL AUTO_INCREMENT,
  `answer` varchar(100) DEFAULT NULL,
  `ans_qid` int(5) DEFAULT NULL,
  PRIMARY KEY (`aid`)
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rootQuizAnswers`
--

LOCK TABLES `rootQuizAnswers` WRITE;
/*!40000 ALTER TABLE `rootQuizAnswers` DISABLE KEYS */;
INSERT INTO `rootQuizAnswers` VALUES (1,'region of active cell division',1),(2,'protoderm',2),(3,'epidermis',3),(4,'tap root',4),(5,'tap root system',4),(6,'fibrous',5),(7,'fibrous root system ',5),(8,'radicle',6),(9,'enlarged root',7),(10,'branch roots',8),(11,'lateral roots',8),(12,'pericycle',9),(13,'gas exchange',10),(14,'endodermis',11),(15,'protostele',12),(16,'siphonostele',13),(17,'prop root',14),(18,'brace root',14),(19,'region of maturation',15),(20,'region of cell differentiation',15),(21,'xylem tissue',16),(22,'xylem',16),(23,'pith',17),(24,'ground meristem',18),(25,'root cap',19),(26,'procambium',20),(27,'photosynthesis',21),(28,'food production',21),(29,'exarch',22),(30,'alternate',23),(31,'radial',23),(32,'anchorage and absorption',24),(33,'increase surface area for absorption',25);
/*!40000 ALTER TABLE `rootQuizAnswers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `rootQuizQuestions`
--

DROP TABLE IF EXISTS `rootQuizQuestions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `rootQuizQuestions` (
  `qid` int(5) NOT NULL AUTO_INCREMENT,
  `question` text,
  PRIMARY KEY (`qid`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rootQuizQuestions`
--

LOCK TABLES `rootQuizQuestions` WRITE;
/*!40000 ALTER TABLE `rootQuizQuestions` DISABLE KEYS */;
INSERT INTO `rootQuizQuestions` VALUES (1,'region within the root where meristematic cells can be found'),(2,'primary meristem that gives rise to the epidermis'),(3,'tissue layer where root hairs come from'),(4,'type of root system exhibited by dicots'),(5,'type of root system exhibited by monocots'),(6,'the primary root developed from what part of a germinating seed?'),(7,'sweet potato, cassava and carrots are example for what type of metamorphosed root?'),(8,'another term for secondary roots?'),(9,'tissue layer that gives rise to secondary roots'),(10,'pneumatophores are metomorphosed roots that are used for?'),(11,'a tissue layer in the root that has a casparian strip'),(12,'type of stele for a dicot root'),(13,'type of stele for a monocot root'),(14,'metamorphosed root found in corn which is used for mechanical support'),(15,'region within the root where the primary tissues are found'),(16,'what tissue layer is found at the centermost part of a dicot root?'),(17,'what tissue layer is found at the centermost part of a monocot root?'),(18,'the cortex came from what primary meristem?'),(19,'structure that protects the root while penetrating the soil by secreting slime'),(20,'primary meristem that gives rise to the vascular tissues'),(21,'green roots in some orchids function for?'),(22,'direction of xylem maturation in the root'),(23,'vascular tissue arrangement in the root'),(24,'two main functions of a root'),(25,'function of root hairs in a root');
/*!40000 ALTER TABLE `rootQuizQuestions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `rootquiz_scores`
--

DROP TABLE IF EXISTS `rootquiz_scores`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `rootquiz_scores` (
  `uid` int(5) NOT NULL,
  `quizNum` int(5) DEFAULT NULL,
  `score` int(5) DEFAULT NULL,
  PRIMARY KEY (`uid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rootquiz_scores`
--

LOCK TABLES `rootquiz_scores` WRITE;
/*!40000 ALTER TABLE `rootquiz_scores` DISABLE KEYS */;
INSERT INTO `rootquiz_scores` VALUES (10003,NULL,0),(10004,NULL,NULL),(10005,NULL,NULL),(10006,NULL,0),(10007,NULL,NULL),(10009,NULL,NULL);
/*!40000 ALTER TABLE `rootquiz_scores` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `section`
--

DROP TABLE IF EXISTS `section`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `section` (
  `sectionid` int(3) NOT NULL AUTO_INCREMENT,
  `sname` varchar(20) DEFAULT NULL,
  `scode` varchar(10) DEFAULT NULL,
  `maxnum` int(5) DEFAULT NULL,
  PRIMARY KEY (`sectionid`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `section`
--

LOCK TABLES `section` WRITE;
/*!40000 ALTER TABLE `section` DISABLE KEYS */;
INSERT INTO `section` VALUES (1,'WX (4:00-7:00 W)','WX-1L',50),(3,'Y (4:00-7:00 Th)','Y-3L',35),(4,'A (7:00-10:00 M)','A-1L',30),(6,'samp','samp',1);
/*!40000 ALTER TABLE `section` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `stemQuizAnswers`
--

DROP TABLE IF EXISTS `stemQuizAnswers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `stemQuizAnswers` (
  `aid` int(5) NOT NULL AUTO_INCREMENT,
  `answer` varchar(100) DEFAULT NULL,
  `ans_qid` int(5) DEFAULT NULL,
  PRIMARY KEY (`aid`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `stemQuizAnswers`
--

LOCK TABLES `stemQuizAnswers` WRITE;
/*!40000 ALTER TABLE `stemQuizAnswers` DISABLE KEYS */;
INSERT INTO `stemQuizAnswers` VALUES (1,'naked',1),(2,'epidermis',2),(3,'TRUE',3),(4,'cortex',4),(5,'cladophyll',5),(6,'epicotyl',6),(7,'FALSE',7),(8,'FALSE',8),(9,'internode',9),(10,'vascular cambium',10),(11,'lenticels',11),(12,'cortex',12),(13,'protostele',13),(14,'atactostele',14),(15,'eustele',15),(16,'collateral',16),(17,'amphivasal',17),(18,'endarch',18),(19,'phellogen',19),(20,'periderm',20),(21,'siphonostele',21),(22,'corm',22),(23,'rhizome',23),(24,'closed',24),(25,'tunica-corpus',25);
/*!40000 ALTER TABLE `stemQuizAnswers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `stemQuizQuestions`
--

DROP TABLE IF EXISTS `stemQuizQuestions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `stemQuizQuestions` (
  `qid` int(5) NOT NULL AUTO_INCREMENT,
  `question` text,
  PRIMARY KEY (`qid`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `stemQuizQuestions`
--

LOCK TABLES `stemQuizQuestions` WRITE;
/*!40000 ALTER TABLE `stemQuizQuestions` DISABLE KEYS */;
INSERT INTO `stemQuizQuestions` VALUES (1,'Monocots: ensheathed stem, Dicots: ? stem'),(2,'Outermost tissue of a young stem?'),(3,'TRUE or FALSE: Stem can give rise to other aerial plant parts.'),(4,'In stem tubers, what is the tissue that expands in size to accommodate the stored food?'),(5,'Metamorphosed stem responsible for photosynthesis?'),(6,'Embryonic part that will develop into stem?'),(7,'TRUE or FALSE. Stems of monocots and dicots can undergo secondary growth.'),(8,'TRUE or FALSE. Cacti have thorns for their protection.'),(9,'Area between two nodes of the stem'),(10,'Fascicular cambium and interfascicular region will give rise to what lateral meristem?'),(11,'Openings in the old stem responsible for transpiration and gas exchange?'),(12,'Origin of cork cambium in the stem?'),(13,'Most primitive type of stele characterized by the absent of pith '),(14,'Stele type of monocot stem'),(15,'Stele type of dicot stem'),(16,'Vascular tissue arrangement characterized by non-overlapping xylem and phloem tissues'),(17,'Vascular tissue arrangement characterized by xylem surrounding the phloem'),(18,'Type of xylem maturation in the stem'),(19,'Lateral meristem producing phellem and phelloderm which is also known as the cork cambium'),(20,'Secondary dermal tissue composed of phellem, phellogen, and phelloderm'),(21,'Stele type characterized by present of pith'),(22,'Metamorphosed stem growing vertically to the soil responsible for storage of starch and can be used for asexual reproduction'),(23,'Metamorphosed stem growing horizontally to the soil responsible for storage of starch and can be used for asexual reproduction'),(24,'Type of vascular bundle exhibited by most of the monocots characterized by the absence of vascular cambium'),(25,'Shoot apex organization of angiosperms');
/*!40000 ALTER TABLE `stemQuizQuestions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `stemquiz_scores`
--

DROP TABLE IF EXISTS `stemquiz_scores`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `stemquiz_scores` (
  `uid` int(5) NOT NULL,
  `quizNum` int(5) DEFAULT NULL,
  `score` int(5) DEFAULT NULL,
  PRIMARY KEY (`uid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `stemquiz_scores`
--

LOCK TABLES `stemquiz_scores` WRITE;
/*!40000 ALTER TABLE `stemquiz_scores` DISABLE KEYS */;
INSERT INTO `stemquiz_scores` VALUES (10003,NULL,2),(10004,NULL,NULL),(10005,NULL,NULL),(10006,NULL,NULL),(10007,NULL,NULL),(10009,NULL,NULL);
/*!40000 ALTER TABLE `stemquiz_scores` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `student`
--

DROP TABLE IF EXISTS `student`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `student` (
  `studentid` int(5) NOT NULL AUTO_INCREMENT,
  `userid` int(5) NOT NULL,
  `dateverified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `empid` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`studentid`),
  KEY `s_userid_fk` (`userid`),
  KEY `s_empid_fk` (`empid`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `student`
--

LOCK TABLES `student` WRITE;
/*!40000 ALTER TABLE `student` DISABLE KEYS */;
INSERT INTO `student` VALUES (3,10003,'2017-07-12 04:17:12','E201510001'),(4,10004,'2017-07-12 04:15:30','E201510001'),(5,10004,'2017-07-12 04:15:30','E201510001'),(6,10005,'2017-11-28 19:56:14','12345'),(7,10006,'2018-01-29 09:10:32','181004012'),(9,10009,'2017-11-29 05:18:30','12345'),(10,10011,'2018-01-29 08:57:24',NULL),(11,10018,'2018-10-09 15:18:08',NULL);
/*!40000 ALTER TABLE `student` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `teacher`
--

DROP TABLE IF EXISTS `teacher`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `teacher` (
  `empid` varchar(10) NOT NULL,
  `userid` int(5) NOT NULL,
  PRIMARY KEY (`empid`),
  KEY `t_userid_fk` (`userid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `teacher`
--

LOCK TABLES `teacher` WRITE;
/*!40000 ALTER TABLE `teacher` DISABLE KEYS */;
INSERT INTO `teacher` VALUES ('E201510001',10001),('12345',10008),('181004012',10010),('1234',10015),('10101',10017);
/*!40000 ALTER TABLE `teacher` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_expedition_completed`
--

DROP TABLE IF EXISTS `user_expedition_completed`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user_expedition_completed` (
  `ecid` int(5) NOT NULL AUTO_INCREMENT,
  `currExpeditionId` int(5) DEFAULT NULL,
  `userid` int(5) DEFAULT NULL,
  PRIMARY KEY (`ecid`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_expedition_completed`
--

LOCK TABLES `user_expedition_completed` WRITE;
/*!40000 ALTER TABLE `user_expedition_completed` DISABLE KEYS */;
INSERT INTO `user_expedition_completed` VALUES (1,0,10003),(4,0,10004),(7,0,10007),(8,0,10005),(9,0,10009),(15,0,10006);
/*!40000 ALTER TABLE `user_expedition_completed` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_expedition_plantslist`
--

DROP TABLE IF EXISTS `user_expedition_plantslist`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user_expedition_plantslist` (
  `epid` int(5) NOT NULL AUTO_INCREMENT,
  `userid` int(5) DEFAULT NULL,
  `expeditionId` int(5) DEFAULT NULL,
  `plantList` text,
  PRIMARY KEY (`epid`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_expedition_plantslist`
--

LOCK TABLES `user_expedition_plantslist` WRITE;
/*!40000 ALTER TABLE `user_expedition_plantslist` DISABLE KEYS */;
INSERT INTO `user_expedition_plantslist` VALUES (1,10003,5,NULL),(2,10004,3,NULL),(5,10007,5,NULL),(6,10005,0,NULL),(7,10009,3,NULL),(13,10006,0,NULL);
/*!40000 ALTER TABLE `user_expedition_plantslist` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_expedition_scores`
--

DROP TABLE IF EXISTS `user_expedition_scores`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user_expedition_scores` (
  `esid` int(5) NOT NULL AUTO_INCREMENT,
  `userid` int(5) DEFAULT NULL,
  `expeditionId` int(3) DEFAULT NULL,
  `score` int(3) DEFAULT NULL,
  `isDone` int(1) DEFAULT NULL,
  `hasAddPoints` int(1) DEFAULT NULL,
  PRIMARY KEY (`esid`)
) ENGINE=InnoDB AUTO_INCREMENT=67 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_expedition_scores`
--

LOCK TABLES `user_expedition_scores` WRITE;
/*!40000 ALTER TABLE `user_expedition_scores` DISABLE KEYS */;
INSERT INTO `user_expedition_scores` VALUES (1,10003,1,19,1,1),(2,10003,2,22,1,1),(3,10003,3,14,1,1),(4,10003,4,50,1,1),(5,10003,5,12,1,1),(6,10004,1,NULL,NULL,NULL),(8,10004,2,NULL,NULL,NULL),(9,10004,3,8,1,1),(10,10004,4,NULL,NULL,NULL),(11,10004,5,NULL,NULL,NULL),(22,10007,1,28,1,1),(23,10007,2,0,1,1),(24,10007,3,8,1,1),(25,10007,4,14,1,1),(26,10007,5,4,1,1),(27,10005,1,NULL,NULL,NULL),(28,10005,2,NULL,NULL,NULL),(29,10005,3,NULL,NULL,NULL),(30,10005,4,NULL,NULL,NULL),(31,10005,5,NULL,NULL,NULL),(32,10009,1,14,1,1),(33,10009,2,NULL,NULL,NULL),(34,10009,3,8,1,1),(35,10009,4,NULL,NULL,NULL),(36,10009,5,NULL,NULL,NULL),(62,10006,1,NULL,NULL,NULL),(63,10006,2,NULL,NULL,NULL),(64,10006,3,NULL,NULL,NULL),(65,10006,4,NULL,NULL,NULL),(66,10006,5,NULL,NULL,NULL);
/*!40000 ALTER TABLE `user_expedition_scores` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_in_section`
--

DROP TABLE IF EXISTS `user_in_section`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user_in_section` (
  `userid` int(5) NOT NULL,
  `sectionid` int(3) NOT NULL,
  `usertype` int(1) DEFAULT NULL,
  UNIQUE KEY `uniqueId` (`userid`,`sectionid`),
  KEY `uis_userid_fk` (`userid`),
  KEY `uis_sectionid_fk` (`sectionid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_in_section`
--

LOCK TABLES `user_in_section` WRITE;
/*!40000 ALTER TABLE `user_in_section` DISABLE KEYS */;
INSERT INTO `user_in_section` VALUES (10001,1,2),(10004,1,0),(10005,3,0),(10006,6,0),(10008,3,2),(10009,3,0),(10010,4,2),(10010,6,2);
/*!40000 ALTER TABLE `user_in_section` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_table`
--

DROP TABLE IF EXISTS `user_table`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user_table` (
  `userid` int(5) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `address` varchar(50) DEFAULT NULL,
  `mobile` varchar(11) DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL,
  `fname` varchar(50) DEFAULT NULL,
  `mname` varchar(50) DEFAULT NULL,
  `lname` varchar(50) DEFAULT NULL,
  `usertype` int(1) DEFAULT NULL,
  `datecreated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`userid`)
) ENGINE=InnoDB AUTO_INCREMENT=10019 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_table`
--

LOCK TABLES `user_table` WRITE;
/*!40000 ALTER TABLE `user_table` DISABLE KEYS */;
INSERT INTO `user_table` VALUES (10000,'admin','28eedda73512efd82a9c4fb900f5e69bc4902b75','Los Banos Laguna','19164575948','admin@gmail.com','Administrator','Po','Ako',1,'2017-06-17 15:47:03'),(10003,'jdelacruz','49fdb328b8b8bdc6bf075680f84bb866f2ac23a7','UPLB','09990000099','juandc@gmail.com','Juan','dela Cruz','dela Cruz',0,'2017-07-12 03:51:22'),(10004,'maguirre','3463435f822879f3951e77810346466b5eaa9ea0','UPLB','09111111111','mga@gmail.com','Marya','Grace','Aguirre',0,'2017-07-12 04:05:50'),(10014,'ivyaguila','831aa019e3684f112960b73e6701006d83074fb6','UPLB','09123456789','ivy@gmail.com','Ivy','Joy','Aguila',1,'2018-10-09 14:11:36'),(10015,'billing','111d3fea1c36b2f9715b7174c430fb17f288d69b','UPLB','09123456789','billing@gmail.com','The Billing','O','Officer',2,'2018-10-09 14:12:15'),(10018,'reader','66a75d8fd73a39a1ef1c4c3d225208a73521e76f','UPLB','09123456789','reader@gmail.com','Reader','am','Sample',3,'2018-10-09 15:20:19');
/*!40000 ALTER TABLE `user_table` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-10-14  0:25:36
