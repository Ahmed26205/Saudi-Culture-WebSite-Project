-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 11, 2025 at 05:51 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `quiz_db_en`
--

-- --------------------------------------------------------

--
-- Table structure for table `centeral`
--

CREATE TABLE `centeral` (
  `COL 1` varchar(128) DEFAULT NULL,
  `COL 2` varchar(239) DEFAULT NULL,
  `COL 3` varchar(74) DEFAULT NULL,
  `COL 4` varchar(22) DEFAULT NULL,
  `COL 5` varchar(11) DEFAULT NULL,
  `COL 6` varchar(27) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `centeral`
--

INSERT INTO `centeral` (`COL 1`, `COL 2`, `COL 3`, `COL 4`, `COL 5`, `COL 6`) VALUES
('Question', 'Choices', 'Answer', 'Question Type', 'Domain', 'Category'),
('What is the most common dish in Central Saudi Arabia?', '–', 'Jareesh', 'Open-ended', 'Common', 'Food'),
('What is the most common sweet in Central Saudi Arabia?', '–', 'Kleija', 'Open-ended', 'Common', 'Food'),
('What is the common traditional street food in Central Saudi Arabia?', '–', 'Grilled Corn, Fried Potatoes', 'Open-ended', 'Common', 'Food'),
('What is the most common breakfast dish in Central Saudi Arabia?', '–', 'Liver (Kibdah), Shakshouka', 'Open-ended', 'Common', 'Food'),
('What is the common traditional drink in Central Saudi Arabia?', '–', 'Saudi Coffee (Gahwa)', 'Open-ended', 'Common', 'Food'),
('What is the traditional clothing for men in Central Saudi Arabia?', '–', 'Al-Murudan, Al-Mukammam', 'Open-ended', 'Common', 'Clothes'),
('What is the traditional clothing for women in Central Saudi Arabia?', '–', 'Al-Nashl Al-Najdi', 'Open-ended', 'Common', 'Clothes'),
('What is the traditional breakfast dish during Eid in Central Saudi Arabia?', '–', 'Jareesh, Qursan, Meat with Rice', 'Open-ended', 'Common', 'Celebration'),
('What are the common traditional dances in Central Saudi Arabia?', '–', 'Al-Ardah', 'Open-ended', 'Common', 'Celebration'),
('What is the common traditional music in Central Saudi Arabia?', '–', 'Al-Samri', 'Open-ended', 'Common', 'Entertainment'),
('What is the common traditional craft in Central Saudi Arabia?', '–', 'Sadu Weaving, Palm-Frond Weaving (Khoos), Mud-Building', 'Open-ended', 'Common', 'Crafts and Work'),
('What is the name of the items the bride buys for her wedding in Central Saudi Arabia?', '–', 'Al-Jihaz (Bridal Set)', 'Open-ended', 'Common', 'Dating'),
('What is the average amount of dowry presented to the wife in Central Saudi Arabia?', '–', '50,000–100,000 SAR', 'Open-ended', 'Common', 'Dating'),
('What is the traditional winter dish made from dates and brown bread in Al-Qassim?', '–', 'Al-Hanini', 'Open-ended', 'Specialized', 'Food'),
('What is the main traditional sweet in the Al-Qassim region?', '–', 'Al-Kleijah', 'Open-ended', 'Specialized', 'Food'),
('What is the name of the traditional Saudi food made from dried yogurt, shaped into white solid pieces?', '–', 'Al-Aqit', 'Open-ended', 'Specialized', 'Food'),
('In which region of Saudi Arabia is “Al-Marqooq” considered a regional dish?', '–', 'Riyadh', 'Open-ended', 'Specialized', 'Food'),
('In which region of Saudi Arabia is “Al-Marasee’” a main traditional dish?', '–', 'Riyadh', 'Open-ended', 'Specialized', 'Food'),
('What areas in central Saudi Arabia were historically known for making jewelry?', '', 'Al-Diriyah, Sudair ,Buraidah  ', 'Open-ended', 'Specialized', 'Crafts and Work'),
('How many stages does the process of producing oud oil in Saudi Arabia go through?', '–', 'Seven stages', 'Open-ended', 'Specialized', 'Crafts and Work'),
('What is “Al-Kummar” in the context of traditional Najdi houses in Saudi Arabia?', '–', 'An architectural feature for storing tea and coffee utensils', 'Open-ended', 'Specialized', 'Architecture'),
('What is “Al-Liwan” in traditional Najdi houses in Riyadh?', '–', 'An open seating area', 'Open-ended', 'Specialized', 'Architecture'),
('What are the traditional architectural styles in the Al-Qassim region?', '–', 'Building residential clusters along trade and pilgrimage caravan routes', 'Open-ended', 'Specialized', 'Architecture'),
('How many rows are formed in the Saudi Ardah dance?', '–', 'Two rows', 'Open-ended', 'Specialized', 'Entertainment'),
('In which musical mode are most Saudi Ardah poems composed and performed?', '–', 'Sika (Al-Sika)', 'Open-ended', 'Specialized', 'Entertainment'),
('Where do people in Riyadh usually go when the weather turns cold?', '–', 'To the desert (Al-Barr)', 'Open-ended', 'Specialized', 'Entertainment'),
('What is the name given to a single strike of the large drum in the Saudi Ardah dance?', '–', 'Al-Tafreedah', 'Open-ended', 'Specialized', 'Entertainment'),
('What does the term “Al-Ta’leelah” refer to in Saudi culture?', '–', 'Evening storytelling', 'Open-ended', 'Specialized', 'Entertainment'),
('What is the name of the famous festival in Riyadh for arts and crafts?', '–', 'Al-Janadriyah', 'Open-ended', 'Specialized', 'Entertainment'),
('Where is the “Al-La’ybouli” dance popular in Saudi Arabia?', '–', 'Central Saudi Arabia', 'Open-ended', 'Specialized', 'Entertainment'),
('What are the most common welcoming phrases in Central Saudi Arabia?', '–', 'Marhaban Alf', 'Open-ended', 'Specialized', 'Languages and Communication'),
('What is the most common dish in Central Saudi Arabia?', 'A. Areeka B. Jareesh C. Mansaf D. Burgers', 'B. Jareesh', 'MCQ (one correct)', 'Common', 'Food'),
('What is the most popular sweet in Central Saudi Arabia?', 'A. Kleija B. Cookies C. Luqaimat D. Kunafa', 'A. Kleija', 'MCQ (one correct)', 'Common', 'Food'),
('What is the most common traditional street food in Central Saudi Arabia?', 'A. Corn B. French Fries C. Mutabbaq D. Shawarma', 'A. Corn', 'MCQ (one correct)', 'Common', 'Food'),
('What is the most common breakfast dish in Central Saudi Arabia?', 'A. Liver (Kebda) B. Areeka C. Ful Medames D. Samboosa', 'A. Liver (Kebda)', 'MCQ (one correct)', 'Common', 'Food'),
('What is the most common traditional drink in Central Saudi Arabia?', 'A. Saudi Coffee (Qahwa) B. Orange Juice C. Mint Tea D. Dates Milk', 'A. Saudi Coffee (Qahwa)', 'MCQ (one correct)', 'Common', 'Food'),
('What is the traditional breakfast dish during Eid-al-Fitr in Central Saudi Arabia?', 'A. Jareesh and Qursan B. Areeka with Ghee C. Mashghoutha D. Tannour Bread', 'A. Jareesh and Qursan', 'MCQ (one correct)', 'Common', 'Celebration'),
('What are the common traditional dances in Central Saudi Arabia?', 'A. Al-Ardha B. Al-Qazou’i C. Al-Huweili D. Al-Tarouq', 'A. Al-Ardha', 'MCQ (one correct)', 'Common', 'Celebration'),
('What is the traditional clothing for women in Central Saudi Arabia?', 'A. Al-Mirwaden B. Al-Nashil Al-Najdi C. Thobe Asiri D. Al-Mufraj', 'B. Al-Nashil Al-Najdi', 'MCQ (one correct)', 'Common', 'Clothes'),
('What is the traditional clothing for men in Central Saudi Arabia?', 'A. Al-Mirwaden B. Al-Thobe and Al-Sudairi C. Al-Dishdasha D. Al-Mufraj', 'A. Al-Mirwaden', 'MCQ (one correct)', 'Common', 'Clothes'),
('What is the common traditional music in Central Saudi Arabia?', 'A. Al-Samri B. Al-Mawal C. Al-Damma D. Al-Aghani Al-Bahriya (Sea Songs)', 'A. Al-Samri', 'MCQ (one correct)', 'Common', 'Entertainment'),
('What is the common traditional craft in Central Saudi Arabia?', 'A. Shipment Making B. Mud Building C. Fishing D. Clock Embroidery', 'B. Mud Building', 'MCQ (one correct)', 'Common', 'Crafts and Work'),
('What is the name of the items the bride buys for her wedding in Central Saudi Arabia?', 'A. Dabish B. Al-Jihaz C. Maher D. Shabka', 'B. Al-Jihaz', 'MCQ (one correct)', 'Common', 'Dating'),
('What is the average amount of dowry presented to the wife in Central Saudi Arabia?', 'A. 20,000–50,000 SAR B. 50,000–100,000 SAR C. 100,000–150,000 SAR D. 150,000–200,000 SAR', 'B. 50,000–100,000 SAR', 'MCQ (one correct)', 'Common', 'Dating'),
('What is the traditional winter dish made from dates and brown bread in Al-Qassim?', 'A. Al-Hanini B. Al-Areekah C. Al-Jareesh D. Al-Hamees', 'A. Al-Hanini', 'MCQ (one correct)', 'Specialized', 'Food'),
('What is the main traditional sweet in the Al-Qassim region?', 'A. Al-Loubyah B. Wheat Harees C. Al-Marasee’ D. Millet Harees', 'C. Al-Marasee’', 'MCQ (one correct)', 'Specialized', 'Food'),
('What is the traditional Saudi food made from dried yogurt, shaped into white solid pieces?', 'A. Al-Aqit B. Labneh C. Ghee D. Yogurt', 'A. Al-Aqit', 'MCQ (one correct)', 'Specialized', 'Food'),
('In which region of Saudi Arabia is \"Al-Marqooq\" considered a traditional dish?', 'A. Al-Qassim B. Hail C. Madinah D. Riyadh', 'D. Riyadh', 'MCQ (one correct)', 'Specialized', 'Food'),
('In which region of Saudi Arabia is \"Al-Marasee’\" a main traditional dish?', 'A. Riyadh B. Al-Baha C. Al-Ahsa D. Asir', 'A. Riyadh', 'MCQ (one correct)', 'Specialized', 'Food'),
('What areas in central Saudi Arabia were historically known for making jewelry?', 'A. Al-Diriyah B. Sudair C. Buraidah D. All of the above', 'D. All of the above', 'MCQ (one correct)', 'Specialized', 'Crafts and Work'),
('How many stages are involved in oud oil production in Saudi Arabia?', 'A. 5 stages B. 6 stages C. 7 stages D. 8 stages', 'C. 7 stages', 'MCQ (one correct)', 'Specialized', 'Crafts and Work'),
('What is \"Al-Kummar\" in traditional Najdi houses in Saudi Arabia?', 'A. Food storage room B. Architectural feature for storing tea and coffee utensils C. Traditional projecting window D. Type of wooden seating', 'B. Architectural feature for storing tea and coffee utensils', 'MCQ (one correct)', 'Specialized', 'Architecture'),
('What is \"Al-Liwan\" in traditional Najdi houses in Riyadh?', 'A. Open seating area B. Storage room C. Courtyard D. Main entrance', 'A. Open seating area', 'MCQ (one correct)', 'Specialized', 'Architecture'),
('What describes traditional building styles in Al-Qassim?', 'A. Building residential clusters along trade and pilgrimage caravan routes B. Constructing elevated stone palaces C. Mud houses in oases D. Square house designs', 'A. Building residential clusters along trade and pilgrimage caravan routes', 'MCQ (one correct)', 'Specialized', 'Architecture'),
('How many rows are formed in the Saudi Ardah dance?', 'A. One row B. Two rows C. Three rows D. Four rows', 'B. Two rows', 'MCQ (one correct)', 'Specialized', 'Entertainment'),
('In which musical mode are most Saudi Ardah poems composed and performed?', 'A. Hijaz B. Saba C. Sika D. Nahawand', 'C. Sika', 'MCQ (one correct)', 'Specialized', 'Entertainment'),
('What is the name of the famous festival in Riyadh for arts and crafts?', 'A. Al-Janadriyah B. Souq Okaz C. Riyadh Season D. Al-Qassim Heritage Festival', 'A. Al-Janadriyah', 'MCQ (one correct)', 'Specialized', 'Entertainment'),
('Where do people in Riyadh usually go when the weather turns cold?', 'A. Desert B. Mountains C. Beach D. Shopping Malls', 'A. Desert', 'MCQ (one correct)', 'Specialized', 'Entertainment'),
('What is the name of a single beat of the large drum in the Saudi Ardah dance?', 'A. Al-Muthaniya B. Al-Tathleeth C. Al-Tafreedah D. Al-Mawazeer', 'C. Al-Tafreedah', 'MCQ (one correct)', 'Specialized', 'Entertainment'),
('Where is the \"Al-La’ybouli\" dance popular in Saudi Arabia?', 'A. Northern Saudi Arabia B. Central Saudi Arabia C. Eastern Saudi Arabia D. Western Saudi Arabia', 'B. Central Saudi Arabia', 'MCQ (one correct)', 'Specialized', 'Entertainment'),
('What does the term \"Al-Ta’leelah\" mean in Saudi culture?', 'A. Coffee gathering B. Evening storytelling C. Wedding preparation D. Night singing', 'B. Evening storytelling', 'MCQ (one correct)', 'Specialized', 'Entertainment'),
('What are the most common welcoming phrases in Central Saudi Arabia?', 'A. Marhaba Alf B. Arhabo C. Marhabli D. Ahlan wa Sahlan', 'A. Marhaba Alf', 'MCQ (one correct)', 'Specialized', 'Languages and Communication'),
('Which of the following traditional dishes are associated with Riyadh?', 'A. Al-Maraqooq B. Al-Maras’ee C. Al-Haneeth D. Al-Arika', 'A and B', 'MCQ (multiple correct)', 'Specialized', 'Food'),
('What is the name of the traditional Saudi dessert made of crispy biscuits filled with date molasses and black lime?', 'A. Kleija B. Mamoul C. Haneeni D. Qursan', 'A', 'MCQ (one correct)', 'Specialized', 'Food'),
('What are the essential ingredients used in preparing \"Al-Haneeni,\" a dish known for its connection to traditional Saudi cuisine?', 'A. Dates and wheat bread B. Butter, dates, and wheat bread C. Honey, wheat bread, and dates D. Milk, honey, and dates', 'C', 'MCQ (one correct)', 'Specialized', 'Food'),
('How can the traditional Saudi dish \"Mathlootha\" be classified?', 'A. Winter dishes B. Summer dishes C. Seasonal dishes D. Year-round dishes', 'A and C', 'MCQ (multiple correct)', 'Specialized', 'Food'),
('Which of the following traditional crafts are practiced in the Qassim region?', 'A. Sadu weaving B. Embroidery C. Perfume and incense making (including Oud oil) D. All of the above', 'D', 'MCQ (one correct)', 'Specialized', 'Crafts and Work'),
('Which of the following are traditional crafts in the Riyadh region of Saudi Arabia?', 'A. Making traditional cloaks (Bishoot) and headbands (Iqal) B. Crafting handmade weapons C. Creating heritage wooden boxes D. All of the above', 'D', 'MCQ (one correct)', 'Specialized', 'Crafts and Work'),
('Who traditionally prepares \"Maamoul Al-Dawasir\" in Saudi culture?', 'A. Women only B. Men specialized in the herbal trade C. Men only D. Elderly men and women', 'A and B', 'MCQ (multiple correct)', 'Specialized', 'Crafts and Work'),
('What are the traditional crafts famous in the Qassim region?', 'A. Making heritage doors B. Crafting traditional utensils C. Designing heritage windows D. None of the above', 'A, B, and C', 'MCQ (multiple correct)', 'Specialized', 'Crafts and Work'),
('What colors are commonly used in Sadu weaving?', 'A. Red and yellow B. White and black C. Blue and yellow D. Red and green', 'D', 'MCQ (one correct)', 'Specialized', 'Crafts and Work'),
('How is the \"Al-Fann Al-Houti\" dance traditionally performed in terms of formation?', 'A. Performers line up in two straight rows facing each other B. Performers form a circular shape C. Performers form a single straight line D. Performers stand randomly', 'A', 'MCQ (one correct)', 'Specialized', 'Entertainment'),
('Where did the \"Naqoos\" or \"Najooz\" dance, a traditional dance and artistic singing style, originate in Saudi Arabia?', 'A. Najd B. Hejaz C. Asir D. Eastern Province', 'A', 'MCQ (one correct)', 'Specialized', 'Entertainment'),
('What is the main musical characteristic of the Saudi Ardah?', 'A. The melody does not exceed the fourth degree of the musical scale B. The rhythm relies heavily on drums for dramatic effect C. The melody is accompanied by string instruments like the Rababa D. The melody is highly melodic and intricate', 'A and B', 'MCQ (multiple correct)', 'Specialized', 'Entertainment'),
('What is the primary role of the poet in the Saudi Ardah?', 'A. To perform the melody on string instruments B. To recite the opening verses, setting the musical tone C. To ensure poetic themes align with heroic and dramatic delivery D. To guide the group with rhythmic chanting', 'C and D', 'MCQ (multiple correct)', 'Specialized', 'Entertainment'),
('Where did the traditional Saudi art of \"Samri\" originate before spreading to other regions?', 'A. Al-Qassim B. Hail C. Wadi Al-Dawasir D. Southern Riyadh', 'A', 'MCQ (one correct)', 'Specialized', 'Entertainment');

-- --------------------------------------------------------

--
-- Table structure for table `east`
--

CREATE TABLE `east` (
  `COL 1` varchar(134) DEFAULT NULL,
  `COL 2` varchar(202) DEFAULT NULL,
  `COL 3` varchar(149) DEFAULT NULL,
  `COL 4` varchar(22) DEFAULT NULL,
  `COL 5` varchar(11) DEFAULT NULL,
  `COL 6` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `east`
--

INSERT INTO `east` (`COL 1`, `COL 2`, `COL 3`, `COL 4`, `COL 5`, `COL 6`) VALUES
('Question', 'Choices', 'Answer', 'Question Type', 'Domain', 'Category'),
('What is the most common dish in East Saudi Arabia?', '–', 'Al-Mahammar, Al-Thareed, Al-Mufallaq Al-Hasawi, Al-Makbous', 'Open-ended', 'Common', 'Food'),
('What is the most common sweet in East Saudi Arabia?', '–', 'Al-Mafrouka, Al-Hanini, Al-Sago', 'Open-ended', 'Common', 'Food'),
('What is the common traditional street food in East Saudi Arabia?', '–', 'Samosa, Falafel, Mutabbaq', 'Open-ended', 'Common', 'Food'),
('What is the most common breakfast dish in East Saudi Arabia?', '–', 'Balaleet (sweet vermicelli with egg)', 'Open-ended', 'Common', 'Food'),
('What is the common traditional drink in East Saudi Arabia?', '–', 'Tea with Taif Rose', 'Open-ended', 'Common', 'Food'),
('What is the traditional clothing for men in East Saudi Arabia?', '–', 'Dishdasha (Thobe)', 'Open-ended', 'Common', 'Clothes'),
('What is the traditional clothing for women in East Saudi Arabia?', '–', 'Daraa, Thobe Hashemi, Masrah, Manthour, Thobe Al-Thuraya, Abaya, Sheilah, Nafnaf', 'Open-ended', 'Common', 'Clothes'),
('What is the traditional breakfast dish during Eid Al-Fitr in East Saudi Arabia?', '–', 'Balaleet, Aseeda, Fateet, Liver, Zalabia', 'Open-ended', 'Common', 'Celebration'),
('What are the common traditional dances in East Saudi Arabia?', '–', 'Ardah Saifiyah (Sword Dance), Fijri Art (Hasawi Style), Daq Al-Hubb, Harvest Dance, Freisa Dance', 'Open-ended', 'Common', 'Celebration'),
('What is the common traditional music in East Saudi Arabia?', '–', 'Fijri, Nahhamah (sea chant), Liwa', 'Open-ended', 'Common', 'Entertainment'),
('What is the common traditional craft in East Saudi Arabia?', '–', 'Pottery, Palm-Frond Weaving (Khoos), Cloak Weaving (Mishlah), Rope Making, Leatherwork, Sword Making, Basket Weaving, Metalwork, Fish Traps (Gargoor)', 'Open-ended', 'Common', 'Crafts and Work'),
('What is the name of the items the bride buys for her wedding in East Saudi Arabia?', '–', 'Shabkah (Bridal Jewelry Set)', 'Open-ended', 'Common', 'Dating'),
('What is the average amount of dowry presented to the wife in East Saudi Arabia?', '–', '25,000–60,000 SAR', 'Open-ended', 'Common', 'Dating'),
('What type of dessert dish in the Eastern Province of Saudi Arabia is made from starchy granules, water, sugar, and ghee?', '–', 'Sago (Al-Sago)', 'Open-ended', 'Specialized', 'Food'),
('What is a traditional dish of the Eastern Province, eaten on the first day of Eid Al-Fitr, made of mashed dates, ghee, and flour?', '–', 'Al-Mamroos', 'Open-ended', 'Specialized', 'Food'),
('What is Harees soup made of in the east of Saudi Arabia?', '–', 'Hassawi wheat', 'Open-ended', 'Specialized', 'Food'),
('What is the dish from the east that relies on rice cooked with sugar and served with fried fish?', '–', 'Al-Mahammar', 'Open-ended', 'Specialized', 'Food'),
('What is the name of the striped fabric worn by men around the lower body, especially by divers in the east?', '–', 'Izar', 'Open-ended', 'Specialized', 'Clothes'),
('What is the name of the traditional sea folklore of Saudi Arabia, common in the east, especially in Qatif?', '–', 'Sanakli Art', 'Open-ended', 'Specialized', 'Entertainment'),
('What is the name of the traditional game popular in Darin Center in the Eastern Region of Saudi Arabia?', '–', 'Jadeer', 'Open-ended', 'Specialized', 'Entertainment'),
('What is the name of the traditional dance performed in the east, considered an ancient heritage, particularly in the Al-Ahsa region?', '–', 'Al-Haida Dance', 'Open-ended', 'Specialized', 'Entertainment'),
('What is the name of the celebration observed in the east during Sha’ban or Ramadan?', '–', 'Garangao (Al-Garqee’an)', 'Open-ended', 'Specialized', 'Celebration'),
('The craft of making Mishlahs (traditional cloaks) is an inherited profession in which families?', '–', 'Al-Ahsa families', 'Open-ended', 'Specialized', 'Crafts and Work'),
('There is a similarity between the jewelry in the eastern and northern regions of Saudi Arabia and the jewelry of which other region?', '–', 'Riyadh', 'Open-ended', 'Specialized', 'Crafts and Work'),
('“Al-Frisi” is a traditional performing art in Saudi Arabia that originated in which region?', '–', 'Eastern Region', 'Open-ended', 'Specialized', 'Crafts and Work'),
('What is the traditional craft referred to as “Al-Qallafa” in Saudi culture?', '–', 'Shipbuilding', 'Open-ended', 'Specialized', 'Crafts and Work'),
('What handicraft, common in the east, is primarily made by women using palm tree products?', '–', 'Palm-Frond Weaving (Khoos)', 'Open-ended', 'Specialized', 'Crafts and Work'),
('What material is used for building ships in the east of Saudi Arabia?', '–', 'Wood', 'Open-ended', 'Specialized', 'Crafts and Work'),
('What are the three main architectural planning styles in the Eastern Region of Saudi Arabia?', '–', 'Coastal architecture, Desert architecture, Agricultural (Oasis) architecture', 'Open-ended', 'Specialized', 'Architecture'),
('What is the most common dish in East Saudi Arabia?', 'A. Areeka B. Ma’asoub C. Mansaf D. Al-Thareed', 'D. Al-Thareed', 'MCQ (one correct)', 'Common', 'Food'),
('What is the most popular sweet in East Saudi Arabia?', 'A. Kleija B. Marsa C. Al-Sago D. Kunafa', 'C. Al-Sago', 'MCQ (one correct)', 'Common', 'Food'),
('Which of the following is a common traditional street food in East Saudi Arabia?', 'A. Shawarma B. Mutabbaq C. Balila D. All of the above', 'B. Mutabbaq', 'MCQ (one correct)', 'Common', 'Food'),
('What is the traditional breakfast dish in Eid Al-Fitr in East Saudi Arabia?', 'A. Ful Medames B. Haneeth C. Mandi D. Balaleet', 'D. Balaleet', 'MCQ (one correct)', 'Common', 'Food'),
('Which of the following is a common traditional drink in East Saudi Arabia?', 'A. Tea with Rose B. Sobya C. Toronj Juice D. Qishr Coffee', 'A. Tea with Rose', 'MCQ (one correct)', 'Common', 'Food'),
('Which of the following is a traditional breakfast dish enjoyed during Eid Al-Fitr in East Saudi Arabia?', 'A. Areeka B. Zalabiya C. Mansaf D. Hanini', 'B. Zalabiya', 'MCQ (one correct)', 'Common', 'Celebration'),
('Which of the following are common traditional dances in East Saudi Arabia?', 'A. Ardah B. Saifiya C. Al-Qazzwai D. Al-Dahha and Samri', 'B. Saifiya', 'MCQ (one correct)', 'Common', 'Celebration'),
('What is the traditional clothing for men in East Saudi Arabia?', 'A. Al-Mirwaden B. Al-Thobe and Al-Sudairi C. Al-Dishdasha D. Al-Mufraj', 'C. Al-Dishdasha', 'MCQ (one correct)', 'Common', 'Clothes'),
('What is the traditional clothing for women in East Saudi Arabia?', 'A. Dara’aah B. Thobe Asiri C. Short Skirt D. Al-Mufraj', 'A. Dara’aah', 'MCQ (one correct)', 'Common', 'Clothes'),
('What are the common traditional dances in East Saudi Arabia?', 'A. Al-Fajri B. Al-Qazoui C. Al-Dabka D. Al-Khutwa', 'A. Al-Fajri', 'MCQ (one correct)', 'Common', 'Entertainment'),
('What is the name of the items the bride buys for her wedding in East Saudi Arabia?', 'A. Al-Dibsh B. Al-Jihaz C. Al-Mahr D. Al-Shabka', 'D. Al-Shabka', 'MCQ (one correct)', 'Common', 'Dating'),
('What is the average amount of dowry presented to the wife in East Saudi Arabia?', 'A. 10,000–20,000 SAR B. 25,000–60,000 SAR C. 70,000–100,000 SAR D. Above 100,000 SAR', 'B. 25,000–60,000 SAR', 'MCQ (one correct)', 'Common', 'Dating'),
('What is the common traditional craft in East Saudi Arabia?', 'A. Woodwork B. Bisht Making C. Al-Qatt Painting D. Flower Decoration', 'B. Bisht Making', 'MCQ (one correct)', 'Common', 'Crafts and Work'),
('Which Saudi dessert is known for its starchy granules?', 'A. Al-Mamroos B. Al-Sago C. Al-Aseeda D. Al-Haneeni', 'B. Al-Sago', 'MCQ (one correct)', 'Specialized', 'Food'),
('What is the main traditional dessert in the Eastern region of Saudi Arabia, also known as “Masabeeb” or “Marageesh”?', 'A. Al-Aseeda B. Al-Haneeni C. Al-Mamroos D. Al-Marasee’', 'C. Al-Mamroos', 'MCQ (one correct)', 'Specialized', 'Food'),
('What is the name of the dish in East Saudi Arabia that is prepared using rice cooked with sugar and served with fried fish?', 'A. Jareesh B. Marqooq C. Mansaf D. Muhammar', 'D. Muhammar', 'MCQ (one correct)', 'Specialized', 'Food'),
('What is Harees soup made of?', 'A. Hassawi Wheat B. African Wheat C. Egyptian Wheat D. Yemeni Wheat', 'A. Hassawi Wheat', 'MCQ (one correct)', 'Specialized', 'Food'),
('What is the name of the striped fabric traditionally worn by men around the lower body, especially by divers in East Saudi Arabia?', 'A. Izaar B. Thobe C. Tannoura D. Shemagh', 'A. Izaar', 'MCQ (one correct)', 'Specialized', 'Clothes'),
('The craft of making Mishlahs (traditional cloaks) is an inherited profession in which families?', 'A. Makkah Families B. Al-Ahsa Families C. Asir Families D. Hail Families', 'B. Al-Ahsa Families', 'MCQ (one correct)', 'Specialized', 'Crafts and Work'),
('What is the traditional craft referred to as “Al-Qallafa” in Saudi culture?', 'A. Lock Repairing B. Shipbuilding C. Jewelry Making D. Sword Repairing', 'B. Shipbuilding', 'MCQ (one correct)', 'Specialized', 'Crafts and Work'),
('What handicraft, common in the East, is primarily made by women using palm tree products?', 'A. Khos B. Safin C. Sadu D. Jewelry', 'A. Khos', 'MCQ (one correct)', 'Specialized', 'Crafts and Work'),
('There is a similarity between the jewelry in the eastern and northern regions of Saudi Arabia and the jewelry of which other region?', 'A. Mecca B. Medina C. Riyadh D. Asir', 'C. Riyadh', 'MCQ (one correct)', 'Specialized', 'Crafts and Work'),
('“Al-Frisi” is a traditional performing art in Saudi Arabia that originated in which region?', 'A. Eastern Region B. Jazan Region C. Makkah Region D. Asir Region', 'A. Eastern Region', 'MCQ (one correct)', 'Specialized', 'Crafts and Work'),
('What material is used for building ships in the east side of Saudi Arabia?', 'A. Wood B. Metal C. Fiberglass D. Plastic', 'A. Wood', 'MCQ (one correct)', 'Specialized', 'Crafts and Work'),
('What is the name of the traditional game popular in Darin Center in the Eastern Region of Saudi Arabia?', 'A. Jidir B. Keram C. Dominoes D. Al-Sibba', 'A. Jidir', 'MCQ (one correct)', 'Specialized', 'Entertainment'),
('What is the name of the traditional dance performed in the east, considered an ancient heritage, particularly in the Al-Ahsa region?', 'A. Ardah B. Al-Dahha C. Al-Heyda D. Al-Mizmar', 'C. Al-Heyda', 'MCQ (one correct)', 'Specialized', 'Entertainment'),
('“Al-Sankali” is a type of maritime art associated with:', 'A. Sailors of the Eastern Region B. Sailors of the Western Region C. Merchants of Northern Saudi Arabia D. Merchants of Southern Saudi Arabia', 'A. Sailors of the Eastern Region', 'MCQ (one correct)', 'Specialized', 'Entertainment'),
('What is the name of the celebration observed in the east during Sha’ban or Ramadan?', 'A. Al-Fitr B. Al-Adha C. Al-Khidhab D. Al-Qarqiaan', 'D. Al-Qarqiaan', 'MCQ (one correct)', 'Specialized', 'Celebration'),
('What are the three main architectural planning styles in the Eastern Region of Saudi Arabia?', 'A. Urban, Rural, and Mixed-Use Architecture B. Coastal, Desert, and Agricultural (Oasis) Architecture C. Modern, Traditional, and Industrial Architecture D. Mountainous, Coastal, and Desert Architecture', 'B. Coastal, Desert, and Agricultural (Oasis) Architecture', 'MCQ (one correct)', 'Specialized', 'Architecture'),
('What is Hassawi rice locally and regionally known as?', 'A. Yemeni Aish B. Green Aish C. Red Aish D. Egyptian Aish', 'C. Red Aish', 'MCQ (one correct)', 'Specialized', 'Food'),
('What are the traditional jobs practiced in the coastal areas of Saudi Arabia, deeply rooted in cultural heritage and economic history?', 'A. Fishing B. Pearl Diving C. Shipbuilding D. Salt Harvesting', 'A, B, and C', 'MCQ (multiple correct)', 'Specialized', 'Crafts and Work'),
('What was the Nu’ayriyah market in Saudi Arabia specialized in selling?', 'A. Livestock B. Electrical Appliances C. Electronics D. Food Items', 'A. Livestock', 'MCQ (one correct)', 'Specialized', 'Crafts and Work'),
('In which regions of Saudi Arabia was the traditional craft of making “Midad” (woven mats) previously popular?', 'A. Riyadh B. Jazan C. Al-Ahsa D. Al-Qatif', 'C and D', 'MCQ (multiple correct)', 'Specialized', 'Crafts and Work'),
('Which of the following are traditional crafts in the Eastern Region of Saudi Arabia?', 'A. Making Traditional Cloaks (Bishoot) and Headbands (Iqal) B. Crafting Handmade Weapons C. Creating Heritage Wooden Boxes D. All of the Above', 'A, B, and C', 'MCQ (multiple correct)', 'Specialized', 'Crafts and Work'),
('How is traditional gypsum (“Juss”) produced in Saudi Arabia?', 'A. Extracted from beneath the earth as clay or limestone B. Dried using palm-wood fires for a full day C. Crushed into a fine powder after being burned D. All of the above', 'A, B, and C', 'MCQ (multiple correct)', 'Specialized', 'Crafts and Work'),
('Which Saudi region is known for its distinct types of gypsum, including “Al-Arabi,” “Al-Khikri,” and “Al-Dhikri”?', 'A. Riyadh B. Al-Ahsa C. Jazan D. Najran', 'B. Al-Ahsa', 'MCQ (one correct)', 'Specialized', 'Crafts and Work'),
('The “Hida Dance” is a traditional dance performed by the people of which region in Saudi Arabia?', 'A. Western Region B. Eastern Region C. Southern Region D. Northern Region', 'B. Eastern Region', 'MCQ (one correct)', 'Specialized', 'Entertainment'),
('Which of the following are styles of the “Laybooni” art form in Saudi Arabia?', 'A. Al-Fajri and Al-Bahri B. Al-Haddadi and Al-Adasani C. Al-Makhlof and Al-Hassawi D. Al-Najdi and Al-Hejazi', 'A, B, and C', 'MCQ (multiple correct)', 'Specialized', 'Entertainment');

-- --------------------------------------------------------

--
-- Table structure for table `general`
--

CREATE TABLE `general` (
  `COL 1` varchar(131) DEFAULT NULL,
  `COL 2` varchar(222) DEFAULT NULL,
  `COL 3` varchar(82) DEFAULT NULL,
  `COL 4` varchar(6) DEFAULT NULL,
  `COL 5` varchar(27) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `general`
--

INSERT INTO `general` (`COL 1`, `COL 2`, `COL 3`, `COL 4`, `COL 5`) VALUES
('Question', 'Choices', 'Answer', 'Domain', 'Category'),
('In Saudi culture, which hand is traditionally used when eating?', '–', 'Right hand', 'Common', 'Food'),
('In traditional Saudi culture, how is rice typically eaten?', '–', 'By hand', 'Common', 'Food'),
('In traditional Saudi culture, how do people shape the rice before eating it?', '–', 'Into a ball shape', 'Common', 'Food'),
('What are the common dining customs in Saudi Arabia?', '–', 'Cutting meat by hand and serving it to the guest; pouring ghee on the guest’s hand', 'Common', 'Food'),
('What is the name of the drink that helps relieve stomach cramps?', '–', 'Fennel, anise, or cumin', 'Common', 'Food'),
('What is the name of the drink that helps relieve menstrual pain in women in Saudi Arabia?', '–', 'Cinnamon and Qishr', 'Common', 'Food'),
('What are the main traditional dishes served during Ramadan in Saudi Arabia?', '–', 'Sambusa, dates, and soup', 'Common', 'Food'),
('What is a common gesture of hospitality offered to guests in Saudi homes?', '–', 'Serving Qahwa (coffee) and dates', 'Common', 'Food'),
('What are the spices traditionally added before serving Saudi coffee?', '–', 'Cardamom and saffron', 'Common', 'Food'),
('What distinguishes the attire of Saudi women in public?', '–', 'Modesty', 'Common', 'Clothes'),
('Do students in Saudi Arabia adhere to a uniform dress code?', '–', 'Yes', 'Common', 'Clothes'),
('What is the traditional clothing for an Imam in Saudi Arabia?', '–', 'Bisht', 'Common', 'Clothes'),
('What is the traditional color of Saudi women\'s abayas?', '–', 'Black', 'Common', 'Clothes'),
('Is it acceptable to wear an agal during a condolence gathering?', '–', 'No', 'Common', 'Clothes'),
('What is the traditional clothing for Saudi women in the street?', '–', 'Abaya', 'Common', 'Clothes'),
('What does the gesture of raising the agal in front of an audience mean?', '–', 'Pride, agreement, or excitement', 'Common', 'languages and communication'),
('When two people meet in their cars and honk their horns, what does this gesture signify?', '–', 'Greeting', 'Common', 'languages and communication'),
('What Arabic phrase is often used to express gratitude?', '–', 'Alhamdulillah', 'Common', 'languages and communication'),
('What is the second language taught in Saudi schools?', '–', 'English', 'Common', 'languages and communication'),
('What is the formal greeting in Saudi Arabia?', '–', 'As-Salamu Alaikum', 'Common', 'languages and communication'),
('What does the gesture of throwing the shemagh at another person signify?', '–', 'Asking a favor, inviting to dinner, or showing pride', 'Common', 'languages and communication'),
('What does the gesture of shaking a coffee cup mean?', '–', 'The guest has had enough coffee', 'Common', 'languages and communication'),
('What are the famous welcoming phrases in Saudi Arabia?', '–', 'Marhaban, Ahlan wa Sahlan', 'Common', 'languages and communication'),
('What does the gesture of snapping fingers while touching the thumb and index finger together signify?', '–', 'Urgency or to draw attention', 'Common', 'languages and communication'),
('What Arabic phrase is used to express hope or intention for the future?', '–', 'Insha’Allah', 'Common', 'languages and communication'),
('What word is commonly used in Saudi Arabia when responding to a request as confirmation?', '–', 'Abshir', 'Common', 'languages and communication'),
('On which day do most teachers in Saudi Arabia typically gather outside of work?', '–', 'Tuesday', 'Common', 'celebration'),
('What is the most popular communication method used by Saudis?', '–', 'WhatsApp and Snapchat', 'Common', 'languages and communication'),
('What is the name of the traditional board game in Saudi Arabia?', '–', 'Keram', 'Common', 'entertainment'),
('What is a traditional musical instrument in Saudi Arabia?', '–', 'Rababa', 'Common', 'entertainment'),
('What is the traditional activity Saudis enjoy in winter?', '–', 'Al-Kashta (desert picnic)', 'Common', 'entertainment'),
('What is the name of the place where friends and families gather on occasions?', '–', 'Al-Majlis', 'Common', 'celebration'),
('What are the common traditions in Saudi Arabia on Fridays?', '–', 'Eating fish, family gathering, attending Jumu’ah prayer', 'Common', 'celebration'),
('What is the most commonly used type of fragrance in Saudi Arabia?', '–', 'Oud', 'Common', 'celebration'),
('What is the tradition when the groom sees the bride for the first time?', '–', 'Al-Shoufah', 'Common', 'Dating'),
('What items is the bride not required to buy from the money given by the groom?', '–', 'Jewelry (gold)', 'Common', 'Dating'),
('What is the traditional name for the bride’s night before the wedding?', '–', 'Laylat Al-Henna', 'Common', 'Dating'),
('What is the concept of “association” among coworkers in Saudi Arabia?', '–', 'Group savings among coworkers', 'Common', 'Crafts and work'),
('Where do children traditionally kiss their grandparents in Saudi culture?', '–', 'On the head', 'Common', 'celebration'),
('Is it acceptable to stay in the host’s house after the host burns oud?', '–', 'No', 'Common', 'celebration'),
('What are the appropriate days to visit parents in Saudi culture?', '–', 'Any day', 'Common', 'celebration'),
('What are the appropriate days to visit family and friends in Saudi Arabia?', '–', 'Weekends', 'Common', 'celebration'),
('What are the main cities Saudis travel to in the summer?', '–', 'Riyadh, Jeddah, Makkah, Madinah, Abha, Khobar', 'Common', 'celebration'),
('What is the most popular traditional medicine in Saudi Arabia?', '–', 'Cauterization', 'Common', 'Crafts and work'),
('What illness is commonly treated using cauterization?', '–', 'Stroke', 'Common', 'Crafts and work'),
('What is a natural remedy that helps soothe throat inflammation in Saudi Arabia?', '–', 'Honey, orange, or lemon', 'Common', 'Food'),
('What is referred to as the “mute doctor” in Saudi Arabia?', '–', 'Black pepper', 'Common', 'Food'),
('Is education in Saudi Arabia mixed between genders?', '–', 'No', 'Common', 'celebration'),
('Do Saudi university students receive a stipend?', '–', 'Yes, around 900–1000 SAR', 'Common', 'celebration'),
('What is the hidden reason behind arguments between friends or family at the cashier in Saudi Arabia?', '–', 'Because everyone wants to pay as an act of generosity', 'Common', 'celebration'),
('Which traditional Saudi Arabian game involves the use of a hat and is commonly played in social gatherings?', 'A. Al-Sadu B. Tag Tag Taqia C. Fersha D. Al-Kattab', 'B. Tag Tag Taqia', 'Common', 'entertainment'),
('What is the name of the traditional Saudi game that mimics football?', 'A. Al-Sadu B. Fersha C. Al-Farfeera D. Tag Tagia', 'C. Al-Farfeera', 'Common', 'entertainment'),
('What is the name of the traditional Saudi activity involving hunting trips with trained birds such as falcons?', 'A. Al-Mahamel B. Al-Miqnas C. Al-Mirfaq D. Al-Marsad', 'B. Al-Miqnas', 'Common', 'entertainment'),
('What is one of the names of the traditional Saudi game \"Al-Barbar\"?', 'A. Umm Al-Khutoot B. Al-Dananeh C. Al-Ziqtah D. Al-Ghammah', 'A. Umm Al-Khutoot', 'Common', 'entertainment'),
('What shape do players sit in during the game \"Tag Tag Tagia\"?', 'A. Circle B. Square C. Rectangle D. Straight line', 'A. Circle', 'Common', 'entertainment'),
('What activity is referred to as \"Al-Kashta\" in Saudi culture?', 'A. Desert trips B. Sea trips C. Mountain trips D. Urban excursions', 'A. Desert trips', 'Common', 'entertainment'),
('What shape does the \"Taraha\" take in Saudi traditional play?', 'A. Square B. Rectangle C. Circle D. Triangle', 'B. Rectangle', 'Common', 'entertainment'),
('What is the name of the traditional game played by girls aged 5–9, similar to jumping rope?', 'A. Qumrah Shabrah B. Al-Habl C. Al-Mal’aab D. Al-Dawrah', 'A. Qumrah Shabrah', 'Common', 'entertainment'),
('What is the traditional Saudi game that begins with a draw to decide who will jump over others?', 'A. Sabt Al-Suboot B. Azeem Sari C. Tug of War D. Tag Tag Tagia', 'A. Sabt Al-Suboot', 'Common', 'entertainment'),
('How is the game \"Jakom Al-Theeb\" played in Saudi Arabia?', 'A. Players hide while one searches for them B. Players chant in a circle C. Players jump over obstacles D. Players catch a thrown object', 'A. Players hide while one searches for them', 'Common', 'entertainment'),
('What determines the color of the \"Mishlah\" (traditional cloak) at official Saudi events?', 'A. The nature of the event B. The presence of the King or Crown Prince C. The location of the event D. The number of attendees', 'B. The presence of the King or Crown Prince', 'Common', 'celebration'),
('What is traditionally applied to the hands before weddings in some Saudi regions?', 'A. Henna B. Oud incense C. Scented oils D. Fragrant powders', 'A. Henna', 'Common', 'celebration'),
('What is the name of the small door within a large door used for entry without opening the entire door?', 'A. Bab Abu Khokha B. Bab Al-Masraf C. Bab Al-Qibla D. Bab Al-Safha', 'A. Bab Abu Khokha', 'Common', 'Architecture'),
('What is the name of the traditional Saudi window or wooden covering that extends outward?', 'A. Roshan B. Mashrabiya C. Qamariya D. Shubbak', 'A. Roshan', 'Common', 'Architecture'),
('What is the name of the traditional Saudi door made from a single panel of wooden planks?', 'A. Bab Bosaer B. Bab Al-Masraf C. Bab Al-Qibla D. Bab Al-Shurfa', 'A. Bab Bosaer', 'Common', 'Architecture'),
('In which month does the traditional role of the \"Musaharati\" typically take place in Islamic culture?', 'A. Muharram B. Ramadan C. Shawwal D. Dhul-Hijjah', 'B. Ramadan', 'Common', 'celebration'),
('When is the Eid Al-Fitr prayer performed in the Islamic Hijri calendar?', 'A. The first day of Shawwal B. The last day of Ramadan C. The tenth of Dhul-Hijjah D. The fifteenth of Sha’ban', 'A. The first day of Shawwal', 'Common', 'celebration'),
('What does the phrase \"Sammu\" mean in Saudi culture?', 'A. Say \"Bismillah\" (In the name of Allah) B. Welcome the guests C. Start the meal D. Enjoy your drink', 'A. Say \"Bismillah\" (In the name of Allah)', 'Common', 'languages and communication'),
('What is the night of marriage called in Saudi Arabia?', 'A. Wedding night B. Laylat Al-Dukhla C. Laylat Al-Zafaf D. Celebration night', 'B. Laylat Al-Dukhla', 'Common', 'Dating'),
('What distinguishes \"Al-Mas’houb\" in Saudi folk poetry?', 'A. It is a poetic meter in Nabati poetry performed with a dragging tone B. It is always performed with traditional dance C. It requires the accompaniment of the Rababa instrument D. It is exclusively sung in desert regions', 'A & C', 'Common', 'entertainment'),
('What is the primary characteristic of the poetic dialogue (Al-Muhawara) in Saudi Arabia?', 'A. It is a mental competition requiring quick poetic creativity B. It is limited to highly skilled poets due to its complexity C. It involves musical instruments D. The performers repeat the final poetic response', 'A, B & D', 'Common', 'entertainment'),
('How many points must one team score to win in the game of Baloot?', 'A. 152 points B. 200 points C. 100 points D. 120 points', 'A. 152 points', 'Common', 'entertainment'),
('What preparations are made for birds in \"Al-Miqnas\" (hunting trips)?', 'A. Sharpening the bird\'s beak B. Trimming the bird\'s claws C. Cleaning the bird\'s feathers D. Training for long-distance flights', 'A & B', 'Common', 'entertainment'),
('When is the game \"Al-Dananeh\" typically played?', 'A. In the morning B. At night C. In the afternoon D. At sunset', 'B. At night', 'Common', 'entertainment'),
('What is the name of the traditional Saudi game that relies on intuition and quick wit?', 'A. Gleimait B. Keram C. Al-Sibba D. Dominoes', 'A. Gleimait', 'Common', 'entertainment'),
('How many small stones and slots are used in the game \"Al-Huwaila\"?', 'A. 28 stones and 13 slots B. 30 rocks and 15 slots C. 28 rocks and 15 slots D. 30 rocks and 13 slots', 'A. 28 stones and 13 slots', 'Common', 'entertainment'),
('What is the \"Raya Al-Ardah Al-Saudia\" (Saudi Ardah Flag)?', 'A. A small flag carried by hand B. A large flag placed in the middle of performers during the Saudi Ardah C. A symbol hung on the wall D. A piece of cloth used as decoration', 'B. A large flag placed in the middle of performers', 'Common', 'entertainment'),
('The palm tree is a significant symbol in Saudi culture, representing various values. Which of the following are true?', 'A. Blessing B. Generosity and giving C. Stability and pride D. None of the above', 'A, B & C', 'Common', 'Crafts and work'),
('Which of the following names are derived from the aesthetic significance of a long and well-shaped nose in Saudi cultural heritage?', 'A. Khushm Al-Bab (Door Nose) B. Khushm Al-Saif (Sword Nose) C. Khushm Al-Jabal (Mountain Nose) D. Khushm Al-Bahr (Sea Nose)', 'A & B', 'Common', 'languages and communication'),
('What are the names of parts of stone houses in Saudi Arabia?', 'A. Al-Ulou and Al-Misraa B. Al-Saih and Al-Qawa’i C. Al-Jahwa and Al-Musha D. None of the above', 'A, B & C', 'Common', 'Architecture'),
('What are the traditional building methods used in constructing heritage houses, walls, and towers in Saudi Arabia?', 'A. Mudbrick construction (Al-Labin) B. Layered masonry (Al-Madameek) C. Wooden beam construction D. Clay-only construction', 'A & B', 'Common', 'Architecture'),
('Where is the traditional \"Bab Bosaer\" door commonly used in Saudi Arabia?', 'A. Internal doors for livestock enclosures B. Large courtyards C. Modern homes D. Heritage palaces', 'A & B', 'Common', 'Architecture'),
('Which of the following are traditional Saudi palm frond crafts?', 'A. Water bottles B. Zanabeel (baskets) C. Storage boxes D. Makans (brooms)', 'B & D', 'Common', 'Crafts and work'),
('What are the main uses of gypsum in traditional Saudi construction?', 'A. Building and decoration B. Coating mud walls C. Covering ceilings D. All of the above', 'D. All of the above', 'Common', 'Crafts and work');

-- --------------------------------------------------------

--
-- Table structure for table `north`
--

CREATE TABLE `north` (
  `COL 1` varchar(106) DEFAULT NULL,
  `COL 2` varchar(236) DEFAULT NULL,
  `COL 3` varchar(75) DEFAULT NULL,
  `COL 4` varchar(22) DEFAULT NULL,
  `COL 5` varchar(11) DEFAULT NULL,
  `COL 6` varchar(27) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `north`
--

INSERT INTO `north` (`COL 1`, `COL 2`, `COL 3`, `COL 4`, `COL 5`, `COL 6`) VALUES
('Question', 'Choices', 'Answer', 'Question Type', 'Domain', 'Category'),
('What is the most common dish in Northern Saudi Arabia?', '–', 'Al-Marqooq', 'Open-ended', 'Common', 'Food'),
('What is the most common dessert in Northern Saudi Arabia?', '–', 'Al-Bakliyah', 'Open-ended', 'Common', 'Food'),
('What is the most popular street food in Northern Saudi Arabia?', '–', 'Foul and Hummus', 'Open-ended', 'Common', 'Food'),
('What is the most common breakfast dish in Northern Saudi Arabia?', '–', 'Mrees Al-Tamr', 'Open-ended', 'Common', 'Food'),
('What is the most popular traditional drink in Northern Saudi Arabia?', '–', 'Bitter Orange Juice', 'Open-ended', 'Common', 'Food'),
('What is the traditional men’s clothing in Northern Saudi Arabia?', '–', 'Al-Sidriyah', 'Open-ended', 'Common', 'Clothes'),
('What is the traditional women’s clothing in Northern Saudi Arabia?', '–', 'Al-Sharsh and Al-Madraqah', 'Open-ended', 'Common', 'Clothes'),
('What is the traditional dish for breakfast on Eid Al-Fitr in Northern Saudi Arabia?', '–', 'Hamisat Al-Lahm Wal-Kibdah', 'Open-ended', 'Common', 'Celebration'),
('What are the traditional dances common in Northern Saudi Arabia?', '–', 'Al-Samri and Al-Dhahha', 'Open-ended', 'Common', 'Entertainment'),
('What is the traditional musical style common in Northern Saudi Arabia?', '–', 'Al-Rababah', 'Open-ended', 'Common', 'Entertainment'),
('What are the traditional crafts common in Northern Saudi Arabia?', '–', 'Al-Sadu, dairy products, soap, and olive pressing', 'Open-ended', 'Common', 'Crafts and Work'),
('What are the items a bride buys for her wedding in Northern Saudi Arabia?', '–', 'Al-Jihaz', 'Open-ended', 'Common', 'Dating'),
('What is the average dowry given to the bride in Northern Saudi Arabia?', '–', '50,000 SAR', 'Open-ended', 'Common', 'Dating'),
('What are some traditional meals associated with Eid Al-Adha in Northern Saudi Arabia?', '–', 'Mansaf, Kabsa, Haneeth, Mufatah, Jareesh, Qursan', 'Open-ended', 'Specialized', 'Food'),
('What are the most common greetings in Northern Saudi Arabia?', '–', 'Haywah, Yallah Haywah', 'Open-ended', 'Specialized', 'Languages and Communication'),
('What does placing your hand over a coffee cup mean in Northern Saudi culture?', '–', 'Enough (contentment)', 'Open-ended', 'Specialized', 'Food'),
('What is the typical amount of coffee served to guests in Northern Saudi Arabia?', '–', 'One-third of the cup', 'Open-ended', 'Specialized', 'Food'),
('Is it acceptable for the host to eat with the guests in Northern Saudi hospitality?', '–', 'Not acceptable', 'Open-ended', 'Specialized', 'Food'),
('Is it acceptable to serve coffee before dates in Northern Saudi hospitality?', '–', 'Not acceptable', 'Open-ended', 'Specialized', 'Food'),
('What is the name of the night before Eid in the Northern region of Saudi Arabia?', '–', 'Laylat Al-Khidhab (Henna Night)', 'Open-ended', 'Specialized', 'Dating'),
('Where is the traditional game \"Al-Fashaq\" popular in Saudi Arabia?', '–', 'Northern Saudi Arabia', 'Open-ended', 'Specialized', 'Entertainment'),
('What is the Saudi traditional game similar to bowling in Northern Saudi Arabia?', '–', 'Al-Fashaq', 'Open-ended', 'Specialized', 'Entertainment'),
('Where is the dance \"Al-Ashouri\" famous in Saudi Arabia?', '–', 'Northern Saudi Arabia', 'Open-ended', 'Specialized', 'Entertainment'),
('When is the game \"Adheem Lah Wayn Gada Wayn Rah\" played in Northern Saudi Arabia?', '–', 'During full moon nights', 'Open-ended', 'Specialized', 'Entertainment'),
('What is the most common dish in Northern Saudi Arabia?', 'A. Al-Mansaf B. Al-Saliq C. Al-Mandi D. Al-Haneeth', 'A', 'MCQ (one correct)', 'Common', 'Food'),
('What is the most common dessert in Northern Saudi Arabia?', 'A. Al-Bakliyah B. Luqaimat C. Kunafa D. Al-Kleija', 'A', 'MCQ (one correct)', 'Common', 'Food'),
('What is the most popular street food in Northern Saudi Arabia?', 'A. Foul and Hummus B. Shawarma C. Mutabbaq D. Falafel', 'A', 'MCQ (one correct)', 'Common', 'Food'),
('What is the most common breakfast dish in Northern Saudi Arabia?', 'A. Balaleet B. Areeka C. Foul and Tamees D. Mrees Al-Tamr', 'D', 'MCQ (one correct)', 'Common', 'Food'),
('What is the most popular traditional drink in Northern Saudi Arabia?', 'A. Sobia B. Qishr Al-Tamr C. Cinnamon D. Bitter Orange Juice', 'D', 'MCQ (one correct)', 'Common', 'Food'),
('What is the traditional men’s clothing in Northern Saudi Arabia?', 'A. Al-Sidriyah and Thobe B. Al-Marodn C. Al-Dishdashah D. Al-Mufrij', 'A', 'MCQ (one correct)', 'Common', 'Clothes'),
('What is the traditional women’s clothing in Northern Saudi Arabia?', 'A. Al-Sharsh and Al-Madraqah B. Al-Abayah C. Al-Thuraya D. Al-Nashl', 'A', 'MCQ (one correct)', 'Common', 'Clothes'),
('What is the traditional musical style common in Northern Saudi Arabia?', 'A. Al-Rababah B. Al-Samri C. Al-Mawal D. Al-Dhahha', 'A', 'MCQ (one correct)', 'Common', 'Entertainment'),
('What are the traditional dances common in Northern Saudi Arabia?', 'A. Al-Dhahha B. Al-Samri C. Al-Ardah D. Al-Rababah', 'A and B', 'MCQ (multiple correct)', 'Common', 'Entertainment'),
('What is the traditional dish for breakfast on Eid Al-Fitr in Northern Saudi Arabia?', 'A. Hamisat Al-Lahm Wal-Kibdah B. Al-Jareesh C. Al-Marqooq D. Al-Qursan', 'A', 'MCQ (one correct)', 'Common', 'Celebration'),
('What are the traditional crafts common in Northern Saudi Arabia?', 'A. Olive Pressing B. Traditional Toolmaking C. Embroidery and Tailoring D. Honey Production', 'C', 'MCQ (one correct)', 'Common', 'Crafts and Work'),
('What are the items a bride buys for her wedding in Northern Saudi Arabia?', 'A. Al-Jihaz B. Al-Zeena C. Henna D. Gold', 'A', 'MCQ (one correct)', 'Common', 'Dating'),
('What is the average dowry given to a bride in Northern Saudi Arabia?', 'A. 30,000 SAR B. 40,000 SAR C. 50,000 SAR D. 60,000 SAR', 'C', 'MCQ (one correct)', 'Common', 'Dating'),
('What are some traditional meals associated with Eid Al-Adha in Northern Saudi Arabia?', 'A. Mansaf B. Kabsa C. Haneeth D. Mufatah', 'A. Mansaf', 'MCQ (one correct)', 'Specialized', 'Food'),
('What are the most common greetings in Northern Saudi Arabia?', 'A. Yallah Haywah B. Arhabu C. Marhaba Alf D. Ahlan Wa Sahlan', 'A. Yallah Haywah', 'MCQ (one correct)', 'Specialized', 'Languages and Communication'),
('What is the name of the night before Eid in the Northern region of Saudi Arabia?', 'A. Laylat Al-Henna B. Laylat Al-Khidhab C. Al-Mabruka D. Laylat Al-Zeena', 'B. Laylat Al-Khidhab', 'MCQ (one correct)', 'Specialized', 'Dating'),
('Where is the traditional game \"Al-Fashaq\" popular in Saudi Arabia?', 'A. Northern Saudi Arabia B. Eastern Saudi Arabia C. Western Saudi Arabia D. Southern Saudi Arabia', 'A. Northern Saudi Arabia', 'MCQ (one correct)', 'Specialized', 'Entertainment'),
('What is the Saudi traditional game similar to bowling?', 'A. Al-Fashaq B. Al-Bakkoura C. Taq Taqiyyah D. Sabaa Al-Hajar', 'A. Al-Fashaq', 'MCQ (one correct)', 'Specialized', 'Entertainment'),
('Where is the dance \"Al-Ashouri\" famous in Saudi Arabia?', 'A. Northern Saudi Arabia B. Central Saudi Arabia C. Eastern Saudi Arabia D. Western Saudi Arabia', 'A. Northern Saudi Arabia', 'MCQ (one correct)', 'Specialized', 'Entertainment'),
('When is the game \"Adheem Lah Wayn Gada Wayn Rah\" played in Northern Saudi Arabia?', 'A. During full moon nights B. During Eid celebrations C. During weddings D. During winter evenings', 'A. During full moon nights', 'MCQ (one correct)', 'Specialized', 'Entertainment'),
('What does placing your hand over a coffee cup mean in Northern Saudi culture?', 'A. Request for more coffee B. Refusal of more coffee C. Thanking the host D. Starting a conversation', 'B. Refusal of more coffee', 'MCQ (one correct)', 'Specialized', 'Food'),
('What is the typical amount of coffee served to guests in Northern Saudi Arabia?', 'A. Quarter of the cup B. One-third of the cup C. Half of the cup D. Full cup', 'B. One-third of the cup', 'MCQ (one correct)', 'Specialized', 'Food'),
('What are the unique hospitality traditions in Northern Saudi Arabia?', 'A. Dates are served first, then coffee is poured after finishing the dates. B. Coffee is served first, then dates after drinking the coffee. C. Coffee and dates are served together. D. Only dates are served without coffee during visits.', 'A. Dates are served first, then coffee is poured after finishing the dates.', 'MCQ (one correct)', 'Specialized', 'Food'),
('Is it acceptable for the host to eat with the guests in Northern Saudi hospitality?', 'A. Yes, the host always eats with the guests. B. No, the host does not eat with the guests when serving food. C. The host eats only with close friends or family members. D. It depends on the occasion and the guest’s preference.', 'B. No, the host does not eat with the guests when serving food.', 'MCQ (one correct)', 'Specialized', 'Food'),
('What architectural planning system does traditional architecture in Al-Jouf rely on?', 'A. Linear architectural planning B. Modular architectural design C. Integrated architectural composition D. Open courtyard planning', 'A', 'MCQ (one correct)', 'Specialized', 'Architecture'),
('What happens during \"Al-Shabbat\" in Northern Saudi Arabia?', 'A. A person opens their home after Asr, Maghrib, or Isha prayer. B. Guests are served traditional meals like Jareesh and Hamees. C. Coffee, tea, and desserts are served. D. Neighbors and friends gather to socialize.', 'A, B, C, and D', 'MCQ (multiple correct)', 'Specialized', 'Entertainment'),
('What is \"Khashrat Al-Eid\" in Hail, and how is it celebrated?', 'A. Preparing competition games for children. B. A gathering of women and children in one home. C. Enjoying light traditional foods, sweets, and nuts. D. A festive event held in mosques.', 'A, B, and C', 'MCQ (multiple correct)', 'Specialized', 'Entertainment'),
('What is a common dish served in Hail during Eid, showcasing housewives’ cooking skills?', 'A. Kabsa decorated with truffles and vegetables. B. Jareesh. C. Lamb Mandi. D. Qursan.', 'A', 'MCQ (one correct)', 'Specialized', 'Food'),
('How do families in Hail ensure everyone in the neighborhood tastes each other’s food during Eid breakfast?', 'A. By inviting all neighbors to one central home. B. By delivering food to each home. C. By sharing meals with travelers and passersby. D. By rotating between plates and tables.', 'D', 'MCQ (one correct)', 'Specialized', 'Food'),
('What are common gathering places in Northern Saudi Arabia?', 'A. Roshan B. Majlis C. Qahwa D. Shabbah', 'B and C', 'MCQ (multiple correct)', 'Specialized', 'Food');

-- --------------------------------------------------------

--
-- Table structure for table `south`
--

CREATE TABLE `south` (
  `COL 1` varchar(154) DEFAULT NULL,
  `COL 2` varchar(243) DEFAULT NULL,
  `COL 3` varchar(134) DEFAULT NULL,
  `COL 4` varchar(22) DEFAULT NULL,
  `COL 5` varchar(11) DEFAULT NULL,
  `COL 6` varchar(27) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `south`
--

INSERT INTO `south` (`COL 1`, `COL 2`, `COL 3`, `COL 4`, `COL 5`, `COL 6`) VALUES
('Question', 'Choices', 'Answer', 'Question Type', 'Domain', 'Category'),
('What is the most common dish in South Saudi Arabia?', '–', 'Areeka, Mashghoutha, Raksh dish, Khameer, Lahoh, Haneeth, Aseedah', 'Open-ended', 'Common', 'Food'),
('What is the most common sweet in South Saudi Arabia?', '–', 'Marsa (Jazan), Dates', 'Open-ended', 'Common', 'Food'),
('What is the common traditional street food in South Saudi Arabia?', '–', 'Tanoor Bread, Barbary Fig (Prickly Pear), Corn, Tea', 'Open-ended', 'Common', 'Food'),
('What is the most common breakfast dish in South Saudi Arabia?', '–', 'Areeka, Tanoor Bread, Ghee, Honey', 'Open-ended', 'Common', 'Food'),
('What is the common traditional drink in South Saudi Arabia?', '–', 'Coffee, Qishr (Coffee Husk Drink)', 'Open-ended', 'Common', 'Food'),
('What is the traditional clothing for men in South Saudi Arabia?', '–', 'Mofraj, Izar (also called Ma’awiz, Maqtab, Fouta, or Musanaf) — a lower-body wrap garment worn by men', 'Open-ended', 'Common', 'Clothes'),
('What is the traditional clothing for women in South Saudi Arabia?', '–', 'Thobe Asiri', 'Open-ended', 'Common', 'Clothes'),
('What is the traditional breakfast dish during Eid Al-Fitr in South Saudi Arabia?', '–', 'Wheat with Ghee and Honey, Mashghoutha, Areeka, Marsa, and Salted Fish', 'Open-ended', 'Common', 'Celebration'),
('What are the common traditional dances in South Saudi Arabia?', '–', 'Gazwai, Ardah Janoubiyah, La’b Shahri, Khatwah Janoubiyah, Dammah', 'Open-ended', 'Common', 'Celebration'),
('What is the common traditional music in South Saudi Arabia?', '–', 'Al-Damma', 'Open-ended', 'Common', 'Entertainment'),
('What is the common traditional craft in South Saudi Arabia?', '–', 'Wood Dish Crafting (Sihaf), Al-Qatt Al-Asiri Art, Aromatic Plant Decoration (garlands, headbands, bouquets), Land Plowing Tools (Sabt)', 'Open-ended', 'Common', 'Crafts and Work'),
('What is the name of the items the bride buys for her wedding in South Saudi Arabia?', '–', 'Marwah (traditional bridal set)', 'Open-ended', 'Common', 'Dating'),
('What is the average amount of dowry presented to the wife in Saudi Arabia?', '–', '40,000 SAR', 'Open-ended', 'Common', 'Dating'),
('What is the name of the traditional butter dish served in South Saudi Arabia?', '–', 'Radifah', 'Open-ended', 'Specialized', 'Food'),
('What is a popular dish known in the southern region of Saudi Arabia, served hot with honey, ghee, and dates?', '–', 'Mashghoutha', 'Open-ended', 'Specialized', 'Food'),
('In which regions of Saudi Arabia is the traditional dish “Haneeth” popular?', '–', 'Southern Region', 'Open-ended', 'Specialized', 'Food'),
('What is the name of the traditional food served to guests in the afternoon in South Saudi Arabia?', '–', 'Wasel', 'Open-ended', 'Specialized', 'Food'),
('What is the traditional oven or pot used for baking in South Saudi Arabia?', '–', 'Tannour', 'Open-ended', 'Specialized', 'Food'),
('In which region of Saudi Arabia is “Al-Maghsh” considered a traditional dish?', '–', 'Jazan', 'Open-ended', 'Specialized', 'Food'),
('What is the name of the traditional clothes in Tehama in South Saudi Arabia?', '–', 'Wizra', 'Open-ended', 'Specialized', 'Clothes'),
('What are the most common greeting phrases in Al-Baha?', '–', '“Marhaban Heel… Ad Al-Seel” (Welcome countless times, like the floodwaters)', 'Open-ended', 'Specialized', 'Languages and Communication'),
('What is the name of the traditional folklore performed at weddings and for greeting guests from different tribes in South Saudi Arabia?', '–', 'Medgal', 'Open-ended', 'Specialized', 'Dating'),
('“Beit Al-Esha” is a traditional architectural style. Which region in Saudi Arabia is known for this style?', '–', 'Jazan', 'Open-ended', 'Specialized', 'Crafts and Work'),
('In which area is the “vegetative style” architecture, known as “Al-Ishash,” commonly found in the Asir region due to its ease of construction?', '–', 'Tihama', 'Open-ended', 'Specialized', 'Crafts and Work'),
('In which region of Saudi Arabia is juniper wood (“Arar”) traditionally used in architecture?', '–', 'Baha, Asir, South', 'Open-ended', 'Specialized', 'Crafts and Work'),
('What does the guest room consist of in Jazan, Saudi Arabia?', '–', 'Beds', 'Open-ended', 'Specialized', 'Crafts and Work'),
('In which region of Saudi Arabia do traditional sitting rooms (majalis) include a stone fireplace used for cooking and preparing coffee in front of guests?', '–', 'Asir', 'Open-ended', 'Specialized', 'Crafts and Work'),
('The “Sword Dance” is a traditional folk dance in Saudi Arabia associated with which region?', '–', 'Jazan', 'Open-ended', 'Specialized', 'Entertainment'),
('What is the form of singing performed individually in South Saudi Arabia, relying on creative embellishments, often during travels?', '–', 'Tarq', 'Open-ended', 'Specialized', 'Entertainment'),
('The “Del’a Dance” is a traditional dance in Saudi Arabia associated with which region?', '–', 'Southern Region', 'Open-ended', 'Specialized', 'Entertainment'),
('The “Janbiya Dance” is a traditional folk dance popular in which region of Saudi Arabia?', '–', 'Jazan, South', 'Open-ended', 'Specialized', 'Entertainment'),
('In which region of Saudi Arabia is the “Al-Azawi Dance” primarily performed?', '–', 'Jazan', 'Open-ended', 'Specialized', 'Entertainment'),
('Is it acceptable in South Saudi Arabia for the host to ask the guest about his updates before serving coffee?', '–', 'Not acceptable', 'Open-ended', 'Specialized', 'Languages and Communication'),
('What is the name given to the artist who paints Al-Qatt Al-Asiri, the traditional Asiri wall art?', '–', 'Al-Qattatah', 'Open-ended', 'Specialized', 'Crafts and Work'),
('What is the most expensive part of a traditional Saudi Janbiya (dagger) that determines its price?', '–', 'Hilt', 'Open-ended', 'Specialized', 'Crafts and Work'),
('What material is traditionally used to make the “Janbiya” dagger in Najran?', '–', 'Iron', 'Open-ended', 'Specialized', 'Crafts and Work'),
('What describes “Al-Qatt Al-Asiri,” a traditional art form in the Asir region?', '–', 'A women’s art of decoration and engraving', 'Open-ended', 'Specialized', 'Crafts and Work'),
('What is the most common traditional craft in Najran city?', '–', 'Dagger making', 'Open-ended', 'Specialized', 'Crafts and Work'),
('What is the most common dish in South Saudi Arabia?', 'A. Hanini B. Jareesh C. Mansaf D. Areeka', 'Areeka', 'MCQ (one correct)', 'Common', 'Food'),
('What is the most popular sweet in South Saudi Arabia?', 'A. Kleija B. Marsa C. Luqaimat D. Kunafa', 'Marsa', 'MCQ (one correct)', 'Common', 'Food'),
('What is the most common traditional street food in South Saudi Arabia?', 'A. Tanoor Bread B. Areeka C. Mutabbaq D. Shawarma', 'Tanoor Bread', 'MCQ (one correct)', 'Common', 'Food'),
('What is the most common breakfast dish in South Saudi Arabia?', 'A. Saleeq B. Areeka C. Ful Medames D. Samboosa', 'Areeka', 'MCQ (one correct)', 'Common', 'Food'),
('What is the most common traditional drink in South Saudi Arabia?', 'A. Mango Juice B. Rose Latte C. Qishr D. Almond Coffee', 'Qishr', 'MCQ (one correct)', 'Common', 'Food'),
('What is the traditional clothing for men in South Saudi Arabia?', 'A. Al-Mirwaden B. Al-Thobe and Al-Sudairi C. Al-Dishdasha D. Al-Mufraj', 'Al-Mufraj', 'MCQ (one correct)', 'Common', 'Clothes'),
('What is the traditional clothing for women in South Saudi Arabia?', 'A. Dara’aah B. Thobe Asiri C. Short Skirt D. Al-Mufraj', 'Thobe Asiri', 'MCQ (one correct)', 'Common', 'Clothes'),
('What is the traditional breakfast dish during Eid Al-Fitr in South Saudi Arabia?', 'A. Jareesh and Qursan B. Areeka with Ghee C. Mashghoutha D. Kleija', 'Areeka with Ghee', 'MCQ (one correct)', 'Common', 'Celebration'),
('What are the common traditional dances in South Saudi Arabia?', 'A. Al-Samri B. Al-Qazoui C. Al-Dabka D. Al-Tarouq', 'Al-Qazoui', 'MCQ (one correct)', 'Common', 'Celebration'),
('What is the common traditional music in South Saudi Arabia?', 'A. Al-Samri B. Al-Mawal C. Al-Damma D. Al-Aghani Al-Bahriya', 'Al-Damma', 'MCQ (one correct)', 'Common', 'Entertainment'),
('What is the common traditional craft in South Saudi Arabia?', 'A. Sadu Weaving B. Al-Mawal C. Al-Qatt Painting D. Palm Weaving', 'Al-Qatt Painting', 'MCQ (one correct)', 'Common', 'Crafts and Work'),
('What is the name of the items the bride buys for her wedding in South Saudi Arabia?', 'A. Shabka B. Dabsh C. Gold D. Mirwah', 'Mirwah', 'MCQ (one correct)', 'Common', 'Dating'),
('What is the average amount of dowry presented to the wife in South Saudi Arabia?', 'A. 30,000–40,000 SAR B. 40,000–60,000 SAR C. 50,000–70,000 SAR D. 60,000–100,000 SAR', '40,000–60,000 SAR', 'MCQ (one correct)', 'Common', 'Dating'),
('In which region of Saudi Arabia is “Al-Maghsh” considered a traditional dish?', 'A. Jazan B. Medina C. Mecca D. Tabuk', 'A. Jazan', 'MCQ (one correct)', 'Specialized', 'Food'),
('“Al-Mashghoutha” is a traditional Saudi dish. Which region is known for preparing it?', 'A. Asir B. Jazan C. Mecca D. Tabuk', 'A. Asir', 'MCQ (one correct)', 'Specialized', 'Food'),
('In which regions of Saudi Arabia is the traditional dish “Haneeth” popular?', 'A. Southwestern Saudi Arabia B. Eastern Saudi Arabia C. Northeastern Saudi Arabia D. Western Saudi Arabia', 'A. Southwestern Saudi Arabia', 'MCQ (one correct)', 'Specialized', 'Food'),
('“Al-Haneeth” is a dish famous in which region of Saudi Arabia?', 'A. Asir B. Jazan C. Mecca D. Medina', 'A. Asir', 'MCQ (one correct)', 'Specialized', 'Food'),
('What is the name of the traditional butter dish served in South Saudi Arabia?', 'A. Radifah B. Hanini C. Haneeth D. Mandi', 'A. Radifah', 'MCQ (one correct)', 'Specialized', 'Food'),
('In which region of Saudi Arabia is juniper wood (“Arar”) traditionally used in architecture?', 'A. Al-Baha B. Asir C. Najran D. Jazan', 'A. Al-Baha B. Asir', 'MCQ (multiple correct)', 'Specialized', 'Crafts and Work'),
('What is the most expensive part of a traditional Saudi Janbiya (dagger) that determines its price?', 'A. Hilt B. Belt C. Blade D. Sheath', 'A. Hilt', 'MCQ (one correct)', 'Specialized', 'Crafts and Work'),
('What is the most common traditional craft in Najran city?', 'A. Making traditional white weapons B. Pottery making C. Weaving and carpet making D. Wall decoration craftsmanship', 'A. Making traditional white weapons', 'MCQ (one correct)', 'Specialized', 'Crafts and Work'),
('What material is traditionally used to make the “Janbiya” dagger in Najran?', 'A. Copper B. Silver C. Iron D. Platinum', 'C. Iron', 'MCQ (one correct)', 'Specialized', 'Crafts and Work'),
('What is the name given to the artist who paints Al-Qatt Al-Asiri, the traditional Asiri wall art?', 'A. Al-Qattatah B. Al-Musaqqifah C. Al-Nassajah D. Al-Rassamah', 'A. Al-Qattatah', 'MCQ (one correct)', 'Specialized', 'Crafts and Work'),
('What describes “Al-Qatt Al-Asiri,” a traditional art form in the Asir region?', 'A. A women’s art of decoration and engraving B. A type of weaving practiced by men C. A culinary tradition unique to the region D. A performance art involving storytelling', 'A. A women’s art of decoration and engraving', 'MCQ (one correct)', 'Specialized', 'Crafts and Work'),
('What are the most common greeting phrases in Al-Baha?', 'A. Marhaban Heel… ‘Ad Al-Seel B. Ya Hala C. Ahlan wa Sahlan D. Haywah', 'A. Marhaban Heel… ‘Ad Al-Seel', 'MCQ (one correct)', 'Specialized', 'Languages and Communication'),
('“Beit Al-Esha” is a traditional architectural style. Which region in Saudi Arabia is known for this style?', 'A. Jazan B. Asir C. Mecca D. Medina', 'A. Jazan', 'MCQ (one correct)', 'Specialized', 'Crafts and Work'),
('In which region of Saudi Arabia do traditional sitting rooms (majalis) include a stone fireplace used for cooking and preparing coffee in front of guests?', 'A. Asir B. Najran C. Jazan D. Riyadh', 'A. Asir', 'MCQ (one correct)', 'Specialized', 'Crafts and Work'),
('In which area is the “vegetative style” architecture, known as “Al-Ishash,” commonly found in the Asir region due to its ease of construction?', 'A. Najran B. Abha C. Tihama D. Jazan', 'C. Tihama', 'MCQ (one correct)', 'Specialized', 'Crafts and Work'),
('The “Del’a Dance” is a traditional dance in Saudi Arabia. It is associated with which region?', 'A. Southern Region B. Eastern Region C. Western Region D. Northern Region', 'A. Southern Region', 'MCQ (one correct)', 'Specialized', 'Entertainment'),
('What is the form of singing performed individually, relying on creative embellishments, and usually performed during travels in South Saudi Arabia?', 'A. Tarq B. Mawal C. Zamil D. Shila', 'A. Tarq', 'MCQ (one correct)', 'Specialized', 'Entertainment'),
('The “Sword Dance” is a traditional folk dance in Saudi Arabia associated with the people of which region?', 'A. Riyadh B. Asir C. Tabuk D. Jazan', 'D. Jazan', 'MCQ (one correct)', 'Specialized', 'Entertainment'),
('The “Janabi Dance” is a traditional folk dance popular in which region of Saudi Arabia?', 'A. Tabuk B. Najran C. Riyadh D. Jazan', 'D. Jazan', 'MCQ (one correct)', 'Specialized', 'Entertainment'),
('In which region of Saudi Arabia is the “Al-Azawi Dance” primarily performed?', 'A. Najran B. Jazan C. Al-Baha D. Asir', 'B. Jazan', 'MCQ (one correct)', 'Specialized', 'Entertainment'),
('What is the name of the traditional food served to guests in the afternoon in South Saudi Arabia?', 'A. Wasl B. Ghada C. Brunch D. Coffee', 'A. Wasl', 'MCQ (one correct)', 'Specialized', 'Food'),
('What is the traditional oven or pot used for baking in South Saudi Arabia?', 'A. Mahnadh B. Mifah C. Furn D. Saj', 'B. Mifah', 'MCQ (one correct)', 'Specialized', 'Food'),
('What is the name of the traditional folklore for weddings and greeting guests from different tribes in South Saudi Arabia?', 'A. Medgal B. Arduh C. Dahha D. Samri', 'A. Medgal', 'MCQ (one correct)', 'Specialized', 'Dating'),
('What does the guest room consist of in Jazan, Saudi Arabia?', 'A. Floor Cushions B. Beds C. Wooden Seats D. Sofas', 'B. Beds', 'MCQ (one correct)', 'Specialized', 'Crafts and Work'),
('Is it acceptable in South Saudi Arabia for the host to ask the guest about his updates before serving coffee?', 'A. Acceptable B. Not Acceptable C. Depends on the guest D. Only in formal gatherings', 'B. Not Acceptable', 'MCQ (one correct)', 'Specialized', 'Languages and Communication'),
('What is correct about Al-Masoub and Al-Areeqa?', 'A. Al-Masoub is more urban and modern than Al-Areeqa. B. Al-Areeqa is more rural and traditional than Al-Masoub. C. Both are equally modern dishes. D. Neither has cultural significance in Saudi cuisine.', 'A and B', 'MCQ (multiple correct)', 'Specialized', 'Food'),
('What are the other names for “Al-Mashghootha” in Saudi culture?', 'A. Al-Aseeda B. Al-Laheeda C. Al-Haneeni D. Al-Jareesh', 'A and B', 'MCQ (multiple correct)', 'Specialized', 'Food'),
('What are the distinctive features of traditional jewelry from the southern region of Saudi Arabia?', 'A. Large size B. Minimal use of gemstones C. Heavy gold decoration D. Intricate gemstone inlays', 'A and B', 'MCQ (multiple correct)', 'Specialized', 'Crafts and Work'),
('Which of the following are traditional crafts known in the Al-Baha region?', 'A. Tar production B. Sesame oil production C. Heritage clothing making D. Fishing', 'A, B, and C', 'MCQ (multiple correct)', 'Specialized', 'Crafts and Work'),
('Which of the following are traditional crafts known in the Asir region?', 'A. Making traditional white weapons B. Pottery making C. Weaving and carpet making D. Palm-frond crafts (Khoos)', 'A, C, and D', 'MCQ (multiple correct)', 'Specialized', 'Crafts and Work'),
('Traditional Saudi Arabian daggers, known as “Janabi,” come in various forms. Which of the following are considered authentic Saudi types?', 'A. Umm Fasous B. Al-Mashtaf C. Al-Saif D. Bow', 'A and B', 'MCQ (multiple correct)', 'Specialized', 'Crafts and Work'),
('In which region of Saudi Arabia is “Al-Mukammam” considered a traditional women’s garment?', 'A. Najran B. Mecca C. Hail D. Tabuk', 'A. Najran', 'MCQ (one correct)', 'Specialized', 'Clothes'),
('The “Zamil” is an ancient folk singing art traditionally known in which regions of Saudi Arabia?', 'A. Riyadh B. Asir C. Al-Jouf D. Najran', 'B and D', 'MCQ (multiple correct)', 'Specialized', 'Entertainment'),
('The “Southern Ardah” is a traditional dance performed in which regions of southwestern Saudi Arabia?', 'A. Najran B. Asir C. Al-Baha D. Jazan', 'A, B, C, and D (All)', 'MCQ (multiple correct)', 'Specialized', 'Entertainment'),
('What is the “Al-Azawi Dance” known for?', 'A. A traditional folk dance performed individually, in pairs, or in groups B. High energy and flexibility in movements C. Usage of Janabi (daggers) in harmony with rhythms and chants D. A dance specific to occasions like weddings and festivals', 'A, B, and C', 'MCQ (multiple correct)', 'Specialized', 'Entertainment');

-- --------------------------------------------------------

--
-- Table structure for table `west`
--

CREATE TABLE `west` (
  `COL 1` varchar(163) DEFAULT NULL,
  `COL 2` varchar(216) DEFAULT NULL,
  `COL 3` varchar(104) DEFAULT NULL,
  `COL 4` varchar(22) DEFAULT NULL,
  `COL 5` varchar(11) DEFAULT NULL,
  `COL 6` varchar(27) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `west`
--

INSERT INTO `west` (`COL 1`, `COL 2`, `COL 3`, `COL 4`, `COL 5`, `COL 6`) VALUES
('Question', 'Choices', 'Answer', 'Question Type', 'Domain', 'Category'),
('What is the most common dish in West Saudi Arabia?', '–', 'Saleeg, Sayadiyah, Kebab Al-Mirwa, Bukhari, Al-Ma’adousah, Salatat', 'Open-ended', 'Common', 'Food'),
('What is the most common sweet in West Saudi Arabia?', '–', 'Qamar Al-Din, Al-Ladu, Al-Labiyah, Al-Ghraibah, Al-Hareesah, Al-Dubayzah, Al-Masiyyah, Al-Saqdanah', 'Open-ended', 'Common', 'Food'),
('What is the common traditional street food in West Saudi Arabia?', '–', 'Balila, Potatoes', 'Open-ended', 'Common', 'Food'),
('What is the most common breakfast dish in West Saudi Arabia?', '–', 'Foul and Tamees', 'Open-ended', 'Common', 'Food'),
('What is the common traditional drink in West Saudi Arabia?', '–', 'Sobia, Raspberry Juice, Qamar Al-Din', 'Open-ended', 'Common', 'Food'),
('What is the traditional clothing for men in West Saudi Arabia?', '–', 'Al-Thobe and Al-Sudairi, Al-Muharid (long-sleeved robe), Al-Aqal Al-Muqasab', 'Open-ended', 'Common', 'Clothes'),
('What is the traditional clothing for women in West Saudi Arabia?', '–', 'Al-Kurta', 'Open-ended', 'Common', 'Clothes'),
('What is the traditional breakfast dish eaten after Eid in West Saudi Arabia?', '–', 'Nowashif', 'Open-ended', 'Common', 'Celebration'),
('What are the common traditional dances in West Saudi Arabia?', '–', 'Al-Mizmar', 'Open-ended', 'Common', 'Entertainment'),
('What is the common traditional music in West Saudi Arabia?', '–', 'Al-Majroor', 'Open-ended', 'Common', 'Entertainment'),
('What is the common traditional craft in West Saudi Arabia?', '–', 'Rosaries and Taif rose perfume, Sadu, pottery products, leather tanning, Al-Dalw, Al-Sabt (land plowing)', 'Open-ended', 'Common', 'Crafts and Work'),
('What is the name of the items the bride buys for her wedding in West Saudi Arabia?', '–', 'Dabish', 'Open-ended', 'Common', 'Dating'),
('What is the average amount of dowry presented to the wife in Saudi Arabia?', '–', '30,000–40,000 SAR', 'Open-ended', 'Common', 'Dating'),
('How can \"Hubb Soup\" be classified as a traditional Saudi stew, and what complementary foods are served with it?', '–', 'Meat', 'Open-ended', 'Specialized', 'Food'),
('What is the name of a common drink in Western Saudi Arabia during Ramadan?', '–', 'Qamar Al-Din', 'Open-ended', 'Specialized', 'Food'),
('What type of rice turns brown and is always served with fried or grilled fish in West Saudi Arabia?', '–', 'Sayadiyah', 'Open-ended', 'Specialized', 'Food'),
('What are the most famous pastries in the Western region of Saudi Arabia?', '–', 'Al-Sharik, Al-Kaak, Al-Fetout', 'Open-ended', 'Specialized', 'Food'),
('What is the name of a famous spice blend in Madinah, Saudi Arabia, known for its distinctive flavor and essential use in local dishes?', '–', 'Al-Daq Al-Madani', 'Open-ended', 'Specialized', 'Food'),
('What is the name of a common drink in Western Saudi Arabia in winter?', '–', 'Sahlab', 'Open-ended', 'Specialized', 'Food'),
('What is the method of greeting a guest in the Western region?', '–', 'Touching the nose and cheeks', 'Open-ended', 'Specialized', 'Languages and Communication'),
('What is the financial amount that the mother of the bride receives upon the marriage contract?', '–', '5,000 SAR', 'Open-ended', 'Specialized', 'Dating'),
('What is the name of the surah in the Quran that is read to declare engagement in West Saudi Arabia?', '–', 'Surat Al-Fatiha', 'Open-ended', 'Specialized', 'Dating'),
('What is the name of the event that happens to the bride before the wedding in West Saudi Arabia?', '–', 'Ghumrah (bride’s dressing ceremony)', 'Open-ended', 'Specialized', 'Dating'),
('What popular drink is usually served to celebrate the Islamic New Year in West Saudi Arabia?', '–', 'Almond Coffee (White Coffee)', 'Open-ended', 'Specialized', 'Celebration'),
('What is the traditional breakfast dish in Eid Al-Adha?', '–', 'Liver (Mgalgal)', 'Open-ended', 'Specialized', 'Celebration'),
('What is the name of a family gathering that happens before Ramadan?', '–', 'Shabna', 'Open-ended', 'Specialized', 'Celebration'),
('Where do the people of Mecca usually go the night the pilgrims spend the night at Arafat?', '–', 'The Holy Mosque', 'Open-ended', 'Specialized', 'Celebration'),
('Which Saudi province is famous for rose distillation and producing rose water?', '–', 'Taif', 'Open-ended', 'Specialized', 'Crafts and Work'),
('What is the name of the person responsible for assisting pilgrims coming from outside Saudi Arabia, guiding them from their arrival in Mecca until their departure?', '–', 'Mutawwif', 'Open-ended', 'Specialized', 'Crafts and Work'),
('What is the name of the traditional job in Mecca that involved providing water to pilgrims and worshippers?', '–', 'Al-Siqayah', 'Open-ended', 'Specialized', 'Crafts and Work'),
('Which regions of Saudi Arabia is the game of Carrom specifically known?', '–', 'The regions of Mecca and Medina', 'Open-ended', 'Specialized', 'Entertainment'),
('What is the \"Kasrah\" in the context of the \"Harabi Dance\"?', '–', 'A poetic form consisting of one or two couplets with a consistent rhythm', 'Open-ended', 'Specialized', 'Entertainment'),
('In which region of Saudi Arabia is the \"Al-Majroor\" dance a popular folkloric tradition?', '–', 'Western Region', 'Open-ended', 'Specialized', 'Entertainment'),
('Where is the dance \"Al-Ashouri\" famous in Saudi Arabia?', '–', 'Western Region', 'Open-ended', 'Specialized', 'Entertainment'),
('What is the most common dish in the west of Saudi Arabia?', 'A. Saleeg B. Jareesh C. Mashwai D. Areeka', 'Saleeg', 'MCQ (one correct)', 'Common', 'Food'),
('What is the most popular sweet in the west of Saudi Arabia?', 'A. Kleija B. Labniah C. Luqaimat D. Kunafa', 'Labniah', 'MCQ (one correct)', 'Common', 'Food'),
('What is the most common traditional street food in the west of Saudi Arabia?', 'A. Tanoor bread B. Balila C. Falafel D. Shawarma', 'Balila', 'MCQ (one correct)', 'Common', 'Food'),
('What is the most common breakfast dish in the west of Saudi Arabia?', 'A. Foul and Tamees B. Areeka C. Omelet D. Cheese', 'Foul and Tamees', 'MCQ (one correct)', 'Common', 'Food'),
('What is the most common traditional drink in the west of Saudi Arabia?', 'A. Mango Juice B. Sobiah C. Qishr D. Almond Coffee', 'Sobiah', 'MCQ (one correct)', 'Common', 'Food'),
('What is the traditional breakfast dish during Eid Al-Fitr in the west of Saudi Arabia?', 'A. Jareesh and Qursan B. Areeka with Ghee C. Mashghoutha D. Nowashif', 'Nowashif', 'MCQ (one correct)', 'Common', 'Celebration'),
('What is the traditional clothing for men in the west of Saudi Arabia?', 'A. Al-Mirwaden B. Al-Thobe and Al-Sudairi C. Al-Dishdasha D. Al-Mufraj', 'Al-Thobe and Al-Sudairi', 'MCQ (one correct)', 'Common', 'Clothes'),
('What is the traditional clothing for women in the west of Saudi Arabia?', 'A. Dara’aah B. Al-Kurta C. Short Skirt D. Al-Mufraj', 'Al-Kurta', 'MCQ (one correct)', 'Common', 'Clothes'),
('What are the common traditional dances in the west of Saudi Arabia?', 'A. Al-Samri B. Al-Qazoui C. Al-Mizmar D. Al-Tarouq', 'Al-Mizmar', 'MCQ (one correct)', 'Common', 'Entertainment'),
('What is the common traditional music in central Saudi Arabia?', 'A. Al-Samri B. Al-Mawal C. Al-Majroor D. Al-Aghani Al-Bahriya', 'Al-Majroor', 'MCQ (one correct)', 'Common', 'Entertainment'),
('What is the common traditional craft in the west of Saudi Arabia?', 'A. Sadu Weaving B. Al-Mawal C. Al-Qatt Painting D. Palm Weaving', 'Sadu Weaving', 'MCQ (one correct)', 'Common', 'Crafts and Work'),
('What is the name of the items the bride buys for her wedding in west Saudi Arabia?', 'A. Dabish B. Jihaz C. Mahr D. Shabka', 'Dabish', 'MCQ (one correct)', 'Common', 'Dating'),
('What is the average amount of dowry presented to the wife in Saudi Arabia?', 'A. 20,000–30,000 B. 30,000–40,000 C. 40,000–50,000 D. 50,000–60,000', '30,000–40,000', 'MCQ (one correct)', 'Common', 'Dating'),
('What type of rice turns brown and is always served with fried or grilled fish in West Saudi Arabia?', 'A. Sayyadiah B. Mandi C. Haneeth D. Kabsa', 'Sayyadiah', 'MCQ (one correct)', 'Specialized', 'Food'),
('What is the name of a common drink in Western Saudi Arabia during Ramadan?', 'A. Qamar Al-Din B. Sahlab C. Cinnamon Drink D. Rose Water', 'Qamar Al-Din', 'MCQ (one correct)', 'Specialized', 'Food'),
('What is the name of a famous spice blend in Madinah, Saudi Arabia, known for its distinctive flavor and essential use in local dishes?', 'A. Daqah Al-Madinah B. Baharat C. Za\'atar D. Sumac', 'Daqah Al-Madinah', 'MCQ (one correct)', 'Specialized', 'Food'),
('What is the name of a common drink in Western Saudi Arabia in winter?', 'A. Sahlab B. Tea C. Orange Juice D. Bitter Orange Juice', 'Sahlab', 'MCQ (one correct)', 'Specialized', 'Food'),
('How can “Hubb Soup” be classified as a traditional Saudi stew, and what complementary foods are served with it?', 'A. Meat B. Cheese C. Rice D. All of the above', 'Meat', 'MCQ (one correct)', 'Specialized', 'Food'),
('What are the most famous pastries in the Western region of Saudi Arabia?', 'A. Al-Sharik B. Al-Ka\'ak C. Al-Fatoot D. All', 'All', 'MCQ (one correct)', 'Specialized', 'Food'),
('What popular drink is usually served to celebrate the Islamic New Year in West Saudi Arabia?', 'A. Saffron B. Almond Coffee C. Date Milk D. Green Tea', 'Almond Coffee', 'MCQ (one correct)', 'Specialized', 'Celebration'),
('What is the name of a family gathering that happens before Ramadan?', 'A. Ramadhnah B. Shabna C. Mawlid Al-Nabi D. Laylat Al-Qadr', 'Shabna', 'MCQ (one correct)', 'Specialized', 'Celebration'),
('What is the traditional breakfast dish in Eid Al-Adha?', 'A. Mugalgal B. Jareesh C. Areekah D. Kabsa', 'Mugalgal (liver dish)', 'MCQ (one correct)', 'Specialized', 'Celebration'),
('What is the name of the traditional job in Mecca that involved providing water to pilgrims and worshippers?', 'A. Al-Saqaya B. Al-Qallafa C. Al-Kassara D. Al-Harasa', 'Al-Saqaya', 'MCQ (one correct)', 'Specialized', 'Crafts and Work'),
('Which Saudi province is famous for rose distillation and producing rose water?', 'A. Taif Province B. Al-Ahsa Province C. Yanbu Province D. Al-Rass Province', 'Taif Province', 'MCQ (one correct)', 'Specialized', 'Crafts and Work'),
('What is the name of the person responsible for assisting pilgrims coming from outside Saudi Arabia, guiding them from their arrival in Mecca until their departure?', 'A. Imam B. Moazen C. Sheikh D. Al-Mutawwif', 'Al-Mutawwif', 'MCQ (one correct)', 'Specialized', 'Crafts and Work'),
('Which regions of Saudi Arabia is the game of Carrom specifically known?', 'A. The regions of Mecca and Medina B. Asir Region C. Al-Baha Region D. Najran Region', 'The regions of Mecca and Medina', 'MCQ (one correct)', 'Specialized', 'Entertainment'),
('What is the “Kasrah” in the context of the “Harabi Dance”?', 'A. A type of traditional drum used in the performance B. A poetic form consisting of one or two couplets with a consistent rhythm C. A dance move specific to the Harabi D. A musical note played during the performance', 'A poetic form consisting of one or two couplets with a consistent rhythm', 'MCQ (one correct)', 'Specialized', 'Entertainment'),
('In which region of Saudi Arabia is the “Al-Majroor” dance a popular folkloric tradition?', 'A. Western Region B. Eastern Region C. Southern Region D. Northern Region', 'Western Region', 'MCQ (one correct)', 'Specialized', 'Entertainment'),
('Where is the dance “Al-Ashouri” famous in Saudi Arabia?', 'A. North Saudi Arabia B. Central Saudi Arabia C. East Saudi Arabia D. West Saudi Arabia', 'West Saudi Arabia', 'MCQ (one correct)', 'Specialized', 'Entertainment'),
('What is the method of greeting a guest in the Western region?', 'A. The Nose and Cheeks B. Forehead C. Hands D. Head', 'The Nose and Cheeks', 'MCQ (one correct)', 'Specialized', 'Languages and Communication'),
('What is the name of the event that happens to the bride before the wedding in West Saudi Arabia?', 'A. Ghumrah B. Al-Zayoon C. Henna Night D. Bridal Shower', 'Ghumrah', 'MCQ (one correct)', 'Specialized', 'Dating'),
('What is the name of the surah in the Quran that is read to declare engagement in West Saudi Arabia?', 'A. Surat Al-Fatiha B. Surat Al-Baqarah C. Surat Yasin D. Surat Al-Ikhlas', 'Surat Al-Fatiha', 'MCQ (one correct)', 'Specialized', 'Dating'),
('What is the financial amount that the mother of the bride receives upon the marriage contract?', 'A. 5,000 B. 10,000 C. 15,000 D. 20,000', '5,000', 'MCQ (one correct)', 'Specialized', 'Dating'),
('Where do the people of Mecca usually go the night the pilgrims spend the night at Arafat during the Hajj days?', 'A. Muzdalifah B. Masjid Quba C. Mina D. Holy Mosque', 'Holy Mosque', 'MCQ (one correct)', 'Specialized', 'Celebration'),
('What color does the red “Mabroom” date tend to?', 'A. Honey-colored B. Yellow C. Brown D. Black', 'D. Black', 'MCQ (one correct)', 'Specialized', 'Food'),
('What is the name of the dish prepared by the people of Medina for Eid breakfast?', 'A. Al-Harees B. Al-Mathlootha C. Al-Aseeda D. Al-Dibiyaza', 'D. Al-Dibiyaza', 'MCQ (one correct)', 'Specialized', 'Food'),
('What accompanies the “Harabi Dance”?', 'A. Rhythms of the Zeer drum and tambourines B. Improvised poetry sung by group leaders (Rabbans) C. Audience chants and shouts D. Tambourine rhythms and poetic verses together', 'A and B', 'MCQ (multiple correct)', 'Specialized', 'Entertainment'),
('The “Yalli Dance” is a traditional group folk dance known in the western region of Saudi Arabia. In which areas is it performed?', 'A. Makkah B. Madinah C. Riyadh D. Jazan', 'A and B', 'MCQ (multiple correct)', 'Specialized', 'Entertainment'),
('What is the traditional attire worn by the “Jassis” in Saudi Arabia?', 'A. Turban worn on the head B. Thobe with a sidari (vest) C. Shawl draped over the shoulder D. Traditional cloak', 'A, B, and C', 'MCQ (multiple correct)', 'Specialized', 'Clothes'),
('What is the common traditional craft in the west of Saudi Arabia?', 'A. Sadu Weaving B. Rose Perfume Production C. Al-Qatt Painting D. Palm Weaving', 'A and B', 'MCQ (multiple correct)', 'Specialized', 'Crafts and Work');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
