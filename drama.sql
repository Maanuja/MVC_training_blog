-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : Dim 12 déc. 2021 à 00:25
-- Version du serveur :  5.7.31
-- Version de PHP : 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `drama`
--

-- --------------------------------------------------------

--
-- Structure de la table `author`
--

DROP TABLE IF EXISTS `author`;
CREATE TABLE IF NOT EXISTS `author` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(150) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(10) NOT NULL,
  `mdp` varchar(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `author`
--

INSERT INTO `author` (`id`, `firstname`, `lastname`, `email`, `phone`, `mdp`) VALUES
(1, 'Rose', 'Pink', 'Rosepink@gmail.com', '0789563426', 'Perfume'),
(2, 'Emily', 'Xu', 'emxu@hotmail.fr', '0638291930', 'BubbleTea'),
(3, 'Mary', 'Smith', 'marys@hotmail.fr', '0456378945', 'marysmith');

-- --------------------------------------------------------

--
-- Structure de la table `contact`
--

DROP TABLE IF EXISTS `contact`;
CREATE TABLE IF NOT EXISTS `contact` (
  `Idcon` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(75) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `prenom` varchar(75) NOT NULL,
  `tel` int(10) NOT NULL,
  `msg` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(75) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`Idcon`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `post`
--

DROP TABLE IF EXISTS `post`;
CREATE TABLE IF NOT EXISTS `post` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `createdAt` datetime NOT NULL,
  `updateAt` datetime DEFAULT NULL,
  `deletedAt` datetime DEFAULT NULL,
  `authorID` int(11) NOT NULL,
  `image` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `Author_post` (`authorID`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `post`
--

INSERT INTO `post` (`id`, `title`, `content`, `createdAt`, `updateAt`, `deletedAt`, `authorID`, `image`) VALUES
(1, 'What is K-drama?', 'Korean drama (Korean: 한국드라마; Hanja: 韓國드라마; RR: han-guk deurama), more popularly known as K-dramas, are television series in the Korean language, made in South Korea. Korean dramas are popular worldwide, partially due to the spread of Korean popular culture (the \"Korean Wave\"), and their widespread availability via streaming services which often offer subtitles in multiple languages. Many K-dramas have been adapted throughout the world, and some have had great impact on other countries. Some of the most famous dramas have been broadcast via traditional television channels in other countries. For example, Dae Jang Geum (2003) was sold to 150 countries. K-dramas have attracted attention for their fashion, style and culture all over the world. The rise in popularity of Korean dramas had led to a great boost to fashion line.', '2021-11-10 16:01:48', '2021-12-11 16:29:10', NULL, 1, '16469dramaboard.jpg'),
(2, 'School 2013', 'Seungri High School ranks as one of the worst of the 178 high schools in Seoul based on academic scores. Seungri High School is now busy preparing presentations for its new students. Class 2 is at the bottom of grade 2 at Seungri High. Nam-Soon (Lee Jong-Suk) is elected class president for grade 2, thanks to the support of Jung-Ho (Kwak Jung-Wook), who is a member of the school gang.', '2021-11-09 14:19:29', '2021-12-09 11:36:02', '2021-12-11 23:31:37', 1, 'School2013.jpg'),
(3, 'Search: WWW (2019)', 'This drama is about the conflicts, the wins, and losses one experiences when working. It will follow the story of 21st century women, who chose to not be a wife or a mother and successfully work without discrimination or impediments.\r\n\r\nBae Ta Mi works as a director for a big web portal company. She is in her late 30\'s and is quite competitive. With her competitiveness, Ta Mi enjoys success. The methods she uses to win has her wondering if she is doing the right thing with her life. Has she sacrificed too much of her personal life for success?\r\n\r\nPark Mo Gun is a man in his 20\'s and is a gifted composer. He creates music for video games. Mo Gun meets Ta Mi at an arcade. He falls in love with her due to her competitive spirit.', '2021-11-09 15:07:29', '2021-12-11 16:38:57', NULL, 2, '33502search_www.jpg'),
(4, 'Melancholia (2021)', 'Melancholia tells the story of Ji Yoon-soo (played by Im Soo-jung) a mathematics teacher at the prestigious private Ahseong High School which is also a hotbed of corruptions. She is good-natured on the outside but gets very tenacious and stubborn once she makes up her mind about something. Extremely passionate about math, she is a teacher who encourages her students to find their own answers. At the school, she meets Baek Seung-yoo (played by Lee Do-hyun), a troubled student who is at the bottom of the class. She notices his potential in math, and with her attention and interactions with him, Seung-yoo\'s grades rises and becomes number one in the class.\r\n\r\nBaek Seung-yoo himself is a student who rarely talks, but he likes to take pictures with his camera. He has no friends at school, but he has a shocking past. When he was a child, he won many mathematical olympiads. When he was 10 years old, he entered the Massachusetts Institute of Technology in the United States, but he suddenly disappeared at the age of 12.\r\n\r\nYoon-soo never knew that her attention and interactions with Seung-yoo would create rumors of a teacher-student sexual scandal among other students and parents, which results in her being fired from her job. Four years later, Yoon-soo and Seung-yoo meet again. Now both as adults, they unite to expose the corruptions at Ahseong High School, and to regain Yoon-soo\'s reputation as a teacher.', '2021-11-15 11:20:37', '2021-12-11 02:59:46', NULL, 2, 'Melancholia.jpg'),
(5, 'Now, We’re Breaking Up (2021)', 'As the design department’s team leader of one of the nation’s top fashion companies, Ha Young Eun has made quite a name for herself in the fashion industry. Beautiful, trendy, and intelligent, Young Eun loves her work and she’s good at what she does. But when it comes to relationships, things are a bit different. Pragmatic to a fault, Young Eun often comes across as cold-hearted, as she prioritizes stability over all else.\r\n\r\nContent in both her work and her life, Young Eun has never really been bothered by the fact that others might see her as cold. But when she meets Yoon Jae Kook, a popular freelance fashion photographer, things take an unexpected turn. The living definition of the perfect man, Jae Kook is wealthy, handsome, and intelligent, but that’s not what catches Young Eun’s attention. There’s something more to Jae Kook that Young Eun just can’t seem to ignore. \r\n\r\nAs if in a dream, Young Eun and Jae Kook find themselves falling for each other. But not all fairy tales have a happy ending. Is theirs a story that will end in heartbreak or will they manage to find their own version of happily ever after, after all?', '2021-11-16 11:20:37', '2021-12-11 03:01:34', NULL, 2, 'Now-We-Are-Breaking-Up.jpg'),
(6, 'School 2017', 'The drama tells realistically of the many various troubles that high school students can face. Ra Eun Ho is just one of them, struggling to survive in a school that discriminates against rich and poor, and believes that the best students are the ones with the best grades. Eun Ho is a cheerful, upbeat girl 18-year-old girl whose dream is to be a webtoon artist. When she mistakenly gets caught up in another student\'s effort to send the school into turmoil, Ra Eun Ho is framed as the legendary Student X, a mysterious troublemaker whose identity is unknown, and suddenly, all of her aspirations are put at risk.', '2021-11-09 14:19:29', '2021-12-10 23:16:49', NULL, 1, 'School2017.jpg'),
(7, 'School 2021', 'School 2021 is the story of students attending a specialized high school and seeking their ambitions, rather than going off to college. It will delve into how these students learn about love, friendship, true passions, and growing up in an intense environment.', '2021-11-09 14:19:29', '2021-12-06 05:23:33', NULL, 1, 'School2021.jpg'),
(8, 'Happiness 2021', 'An apocalyptic thriller that takes place in a time in which infectious diseases have become the new normal.\r\n\r\nIn a newly constructed apartment in a large city where the higher floors are up for general sales and the lower floors are rented out, the drama depicts the subtle psychological battle and the class discrimination that occurs. The city hits rock bottom when an impending apocalypse hits in the form of a new type of infectious disease in which people suffer from unabated thirst.', '2021-12-09 14:58:34', NULL, NULL, 1, 'Happiness.jpg'),
(9, 'She Was Pretty (2015)', 'A romantic comedy, based on a true story, about two past acquaintances who meet again after they\'ve gone through a reversal of fortunes and appearances, set in the backdrop of a fashion magazine\'s publishing office.\r\n\r\nKim Hye-jin was a beautiful girl from a rich family, aka the \"Cha\'s\". After her family\'s publishing company went bankrupt, she experienced hardships then lost her beauty too. Ji Sung-joon was an unattractive boy with low self-esteem, but grows up as a handsome and successful editor.\r\n\r\nThe two decided to meet again as adults, but Sung-joon was unable to recognize Hye-jin. Ashamed to meet her first love and ruin his perception of her, Hye-jin asks her attractive best friend, Ha-ri, to appear in her place. Things, however, soon get complicated as Hye-jin was assigned to work at The Most magazine publishing office where Sung-joon is the deputy chief editor. He openly mistreats and belittles her for her clumsy nature, not knowing that she was his real childhood friend. Ha-ri also continues to meet Sung-joon, and soon develops feelings for him. On the other hand, Hye-jin finds a good friend in her workplace, Shin-hyuk, who slowly falls in love with her.', '2021-12-10 22:10:39', '2021-12-11 16:04:17', NULL, 3, '9shewaspretty.jpg'),
(10, 'Start-Up (2020)', 'Set in one of the world’s most advanced tech sector, “Start Up” tells the tale of the razor-thin margins between ultimate success and abject failure. The story takes place in the fictional Sandbox Company,  where the journey of four unique people is told.\r\n\r\nAfter a revolving door of unfulfilling retail jobs, Seo Dal Mi is unsatisfied with the current trajectory of her life. Her soul longs for a grand adventure that sees her at the top and managing her own company. Although she does not have much to offer, she has big dreams, red hot ambition, and the soul of a pioneer.\r\n\r\nA constant source of his family\'s pride as a child, Nam Do San as an adult is the founder of Sam San Tech, a fledgling start-up company that is looking to transition into bigger endeavors. But a vague dream and limited ambition see his company flounder. Unknown to him, the tailwinds of fate has begun to fill up SST\'s sails.\r\n\r\nHan Ji Pyeong, a man who does not want to owe anyone anything, owes a large debt to one special person who helped him greatly in the past. His role in the start-up world sees him as Judge, Jury, and Executioner, as his pragmatic advice sees the futures of start-ups either rise into greatness or fall into obscurity.\r\n\r\nTired of doing all the work, but seeing the credit go to someone else, Won In Jae yearns to prove herself in a male-dominated industry, as a capable woman who can succeed without the advantages her privileged childhood has given her.', '2021-12-11 03:08:48', NULL, NULL, 1, 'StartUp.jpg'),
(11, 'Move To Heaven (2021)', 'Geu Roo is a young autistic man. He works for his father’s business “Move To Heaven.” Their job is to arrange items left by deceased people. One day, Geu Roo\'s own father dies. Geu Roo is left alone, but his uncle Sang Koo suddenly appears in front of him. Sang Koo is a cold man. He was a martial artist who fought in underground matches. He went to prison because of what happened at his fight. Sang Koo now becomes Geu Roo’s guardian. They run “Move To Heaven” together.', '2021-12-11 15:54:43', '2021-12-11 21:54:18', NULL, 3, '3movetoheaven.jpg');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `post`
--
ALTER TABLE `post`
  ADD CONSTRAINT `Author_post` FOREIGN KEY (`authorID`) REFERENCES `author` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
