-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Oct 29, 2019 at 09:33 AM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+05:30";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bookstore`
--

-- --------------------------------------------------------

--
-- Table structure for table `author`
--
-- Creation: Sep 07, 2019 at 05:13 AM
--

CREATE TABLE `author` (
  `name` varchar(15) NOT NULL,
  `bio` text,
  `site` text,
  `picture` varchar(100) DEFAULT NULL,
  `dob` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- RELATIONSHIPS FOR TABLE `author`:
--

--
-- Dumping data for table `author`
--

INSERT INTO `author` (`name`, `bio`, `site`, `picture`, `dob`) VALUES
('admin_author', 'The admin\'s ramblings', '127.0.0.1/phpmyadmin', NULL, '2019-08-30'),
('Anne Frank', 'Annelies Marie \"Anne\" Frank was a Jewish girl born in the city of Frankfurt, Germany. Her father moved to the Netherlands in 1933 and the rest of the family followed later. Anne was the last of the family to come to the Netherlands, in February 1934. She wrote a diary while in hiding with her family and four friends in Amsterdam during the German occupation of the Netherlands in World War II.\r\n\r\nShe lived in Amsterdam with her parents and sister. During the Holocaust, Anne and her family hid in the attic of her father\'s office to escape the Nazis. It was during that time period that she had recorded her life in her diary.\r\n\r\nAnne died in Bergen-Belsen, in February 1945, at the age of 15.', 'www.annefrank.org', 'https://images.gr-assets.com/authors/1343271406p8/3720.jpg', '1929-06-12'),
('George Orwell', ' Eric Arthur Blair, better known by his pen name George Orwell, was an English author and journalist. His work is marked by keen intelligence and wit, a profound awareness of social injustice, an intense opposition to totalitarianism, a passion for clarity in language, and a belief in democratic socialism.\r\n\r\nIn addition to his literary career Orwell served as a police officer with the Indian Imperial Police in Burma from 1922-1927 and fought with the Republicans in the Spanish Civil War from 1936-1937. Orwell was severely wounded when he was shot through his throat. Later the organization that he had joined when he joined the Republican cause, The Workers Party of Marxist Unification (POUM), was painted by the pro-Soviet Communists as a Trotskyist organization (Trotsky was Joseph Stalin\'s enemy) and disbanded. Orwell and his wife were accused of \"rabid Trotskyism\" and tried in absentia in Barcelona, along with other leaders of the POUM, in 1938. However by then they had escaped from Spain and returned to England.\r\n\r\nBetween 1941 and 1943, Orwell worked on propaganda for the BBC. In 1943, he became literary editor of the Tribune, a weekly left-wing magazine. He was a prolific polemical journalist, article writer, literary critic, reviewer, poet, and writer of fiction, and, considered perhaps the twentieth century\'s best chronicler of English culture.\r\n\r\nOrwell is best known for the dystopian novel Nineteen Eighty-Four (published in 1949) and the satirical novella Animal Farm (1945) — they have together sold more copies than any two books by any other twentieth-century author. His 1938 book Homage to Catalonia, an account of his experiences as a volunteer on the Republican side during the Spanish Civil War, together with numerous essays on politics, literature, language, and culture, have been widely acclaimed.\r\n\r\nOrwell\'s influence on contemporary culture, popular and political, continues decades after his death. Several of his neologisms, along with the term \"Orwellian\" — now a byword for any oppressive or manipulative social phenomenon opposed to a free society — have entered the vernacular.', 'http://www.george-orwell.org/', 'https://images.gr-assets.com/authors/1450573063p8/3706.jpg', '1950-06-25'),
('J.K Rowling', 'J.K. Rowling is the author of the bestselling Harry Potter series of seven books, published between 1997 and 2007, which have sold over 500 million copies worldwide, are distributed in more than 200 territories and translated into 80 languages, and have been turned into eight blockbuster films. She has written three companion volumes: Quidditch Through the Agesand Fantastic Beasts and Where to Find Themin aid of Comic Relief; and The Tales of Beedle the Bardin aid of her non-profit children’s organisation Lumos. In 2012, J.K. Rowling’s digital entertainment and e-commerce company Pottermore was launched, where fans can enjoy news, features and articles, as well as original content by J.K. Rowling. It is also the global digital publisher of Harry Potter and J.K. Rowling’s Wizarding World. Her first novel for adult readers, The Casual Vacancy was published in September 2012 and adapted for TV by the BBC in 2015. Her crime novels, written under the pseudonym Robert Galbraith, were published in 2013 (The Cuckoo’s Calling), 2014 (The Silkworm) and 2015 (Career of Evil), and were adapted for a major new television series for BBC One in 2017, produced by Brontë Film and Television. J.K. Rowling’s 2008 Harvard commencement speech was published in 2015 as an illustrated book, Very Good Lives: The Fringe Benefits of Failure and the Importance of Imagination, and sold in aid of Lumos and university–wide financial aid at Harvard. J.K. Rowling collaborated on the stage play Harry Potter and the Cursed Child: Parts One and Two, an original new story by J.K. Rowling, Jack Thorne, and John Tiffany, a new play by Jack Thorne, now running at The Palace Theatre in London’s West End.In addition, J.K. Rowling made her screenwriting debut with the film Fantastic Beasts and Where to Find Them, a further extension of the Wizarding World, released to critical acclaim in November 2016. A prequel to Harry Potter, this new adventure of Magizoologist Newt Scamander marked the start of a five-film series to be written by the author. As well as receiving an OBE for services to children\'s literature, she has received many awards and honours, including France’s Legion d’Honneur and the Hans Christian Andersen Award. J.K. Rowling supports a number of causes through her charitable trust, Volant. She is also the founder and president of the international non-profit children’s organization Lumos, which works to end the institutionalisation of children globally and ensure they grow up in a safe and caring environment.', 'http://www.jkrowling.com/', 'https://www.jkrowling.com/wp-content/uploads/2018/11/JKRowling_Photo.jpg', '1965-07-31');

-- --------------------------------------------------------

--
-- Table structure for table `book`
--
-- Creation: Oct 28, 2019 at 07:40 PM
--

CREATE TABLE `book` (
  `isbn` bigint(13) NOT NULL,
  `name` varchar(100) NOT NULL,
  `detail` text NOT NULL,
  `date_published` date NOT NULL,
  `price` float NOT NULL,
  `book_number` int(11) DEFAULT NULL,
  `series` varchar(15) DEFAULT NULL,
  `publisher` varchar(50) NOT NULL,
  `author` varchar(15) NOT NULL,
  `picture` varchar(100) DEFAULT NULL,
  `total_pages` int(11) NOT NULL,
  `date_added` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- RELATIONSHIPS FOR TABLE `book`:
--   `author`
--       `author` -> `name`
--   `publisher`
--       `publisher` -> `name`
--   `series`
--       `series` -> `title`
--

--
-- Dumping data for table `book`
--

INSERT INTO `book` (`isbn`, `name`, `detail`, `date_published`, `price`, `book_number`, `series`, `publisher`, `author`, `picture`, `total_pages`, `date_added`) VALUES
(9780439064866, ' Harry Potter and the Chamber of Secrets ', ' The Dursleys were so mean and hideous that summer that all Harry Potter wanted was to get back to the Hogwarts School for Witchcraft and Wizardry. But just as he\'s packing his bags, Harry receives a warning from a strange, impish creature named Dobby who says that if Harry Potter returns to Hogwarts, disaster will strike\r\n\r\nAnd strike it does. For in Harry\'s second year at Hogwarts, fresh torments and horrors arise, including an outrageously stuck-up new professor, Gilderoy Lockhart, a spirit named Moaning Myrtle who haunts the girls\' bathroom, and the unwanted attentions of Ron Weasley\'s younger sister, Ginny.\r\n\r\nBut each of these seem minor annoyances when the real trouble begins, and someone -- or something -- starts turning Hogwarts students to stone. Could it be Draco Malfoy, a more poisonous rival than ever? Could it possibly be Hagrid, whose mysterious past is finally told? Or could it be the one everyone at Hogwarts most suspects . . . Harry Potter himself?', '1998-07-02', 100, 2, 'Harry Potter', 'Scholastic Inc.', 'J.K Rowling', 'https://i.gr-assets.com/images/S/compressed.photo.goodreads.com/books/1474169725l/15881._SY475_.jpg', 0, '2019-09-17 14:33:24'),
(9780439139601, ' Harry Potter and the Goblet of Fire ', ' Harry Potter is midway through his training as a wizard and his coming of age. Harry wants to get away from the pernicious Dursleys and go to the International Quidditch Cup. He wants to find out about the mysterious event that\'s supposed to take place at Hogwarts this year, an event involving two other rival schools of magic, and a competition that hasn\'t happened for a hundred years. He wants to be a normal, fourteen-year-old wizard. But unfortunately for Harry Potter, he\'s not normal - even by wizarding standards. And in his case, different can be deadly.', '2000-07-08', 100, 4, 'Harry Potter', 'Scholastic Inc.', 'J.K Rowling', 'https://i.gr-assets.com/images/S/compressed.photo.goodreads.com/books/1554006152l/6.jpg', 0, '2019-09-17 14:33:24'),
(9780439358071, ' Harry Potter and the Order of the Phoenix ', 'Harry has a lot on his mind for this, his fifth year at Hogwarts: a Defense Against the Dark Arts teacher with a personality like poisoned honey; a big surprise on the Gryffindor Quidditch team; and the looming terror of the Ordinary Wizarding Level exams. But all these things pale next to the growing threat of He-Who-Must-Not-Be-Named---a threat that neither the magical government nor the authorities at Hogwarts can stop.\r\n\r\nAs the grasp of darkness tightens, Harry must discover the true depth and strength of his friends, the importance of boundless loyalty, and the shocking price of unbearable sacrifice.\r\n\r\nHis fate depends on them all.', '2003-07-21', 100, 5, 'Harry Potter', 'Scholastic Inc.', 'J.K Rowling', 'https://i.gr-assets.com/images/S/compressed.photo.goodreads.com/books/1546910265l/2.jpg', 0, '2019-09-17 14:33:24'),
(9780439554930, ' Harry Potter and the Sorcerer\'s Stone', 'Harry Potter\'s life is miserable. His parents are dead and he\'s stuck with his heartless relatives, who force him to live in a tiny closet under the stairs. But his fortune changes when he receives a letter that tells him the truth about himself: he\'s a wizard. A mysterious visitor rescues him from his relatives and takes him to his new home, Hogwarts School of Witchcraft and Wizardry.\r\n\r\nAfter a lifetime of bottling up his magical powers, Harry finally feels like a normal kid. But even within the Wizarding community, he is special. He is the boy who lived: the only person to have ever survived a killing curse inflicted by the evil Lord Voldemort, who launched a brutal takeover of the Wizarding world, only to vanish after failing to kill Harry.\r\n\r\nThough Harry\'s first year at Hogwarts is the best of his life, not everything is perfect. There is a dangerous secret object hidden within the castle walls, and Harry believes it\'s his responsibility to prevent it from falling into evil hands. But doing so will bring him into contact with forces more terrifying than he ever could have imagined.\r\n\r\nFull of sympathetic characters, wildly imaginative situations, and countless exciting details, the first installment in the series assembles an unforgettable magical world and sets the stage for many high-stakes adventures to come. ', '1997-06-26', 100, 1, 'Harry Potter', 'Scholastic Inc.', 'J.K Rowling', 'https://i.gr-assets.com/images/S/compressed.photo.goodreads.com/books/1474154022l/3._SY475_.jpg', 0, '2019-09-17 14:33:24'),
(9780439655484, ' Harry Potter and the Prisoner of Azkaban ', ' Harry Potter\'s third year at Hogwarts is full of new dangers. A convicted murderer, Sirius Black, has broken out of Azkaban prison, and it seems he\'s after Harry. Now Hogwarts is being patrolled by the dementors, the Azkaban guards who are hunting Sirius. But Harry can\'t imagine that Sirius or, for that matter, the evil Lord Voldemort could be more frightening than the dementors themselves, who have the terrible power to fill anyone they come across with aching loneliness and despair. Meanwhile, life continues as usual at Hogwarts. A top-of-the-line broom takes Harry\'s success at Quidditch, the sport of the Wizarding world, to new heights. A cute fourth-year student catches his eye. And he becomes close with the new Defense of the Dark Arts teacher, who was a childhood friend of his father. Yet despite the relative safety of life at Hogwarts and the best efforts of the dementors, the threat of Sirius Black grows ever closer. But if Harry has learned anything from his education in wizardry, it is that things are often not what they seem. Tragic revelations, heartwarming surprises, and high-stakes magical adventures await the boy wizard in this funny and poignant third installment of the beloved series.', '1999-07-08', 100, 3, 'Harry Potter', 'Scholastic Inc.', 'J.K Rowling', 'https://i.gr-assets.com/images/S/compressed.photo.goodreads.com/books/1499277281l/5.jpg', 0, '2019-09-17 14:33:24'),
(9780439785969, ' Harry Potter and the Half-Blood Prince ', ' When Harry Potter and the Half-Blood Prince opens, the war against Voldemort has begun. The Wizarding world has split down the middle, and as the casualties mount, the effects even spill over onto the Muggles. Dumbledore is away from Hogwarts for long periods, and the Order of the Phoenix has suffered grievous losses. And yet, as in all wars, life goes on.\r\n\r\nHarry, Ron, and Hermione, having passed their O.W.L. level exams, start on their specialist N.E.W.T. courses. Sixth-year students learn to Apparate, losing a few eyebrows in the process. Teenagers flirt and fight and fall in love. Harry becomes captain of the Gryffindor Quidditch team, while Draco Malfoy pursues his own dark ends. And classes are as fascinating and confounding as ever, as Harry receives some extraordinary help in Potions from the mysterious Half-Blood Prince.\r\n\r\nMost importantly, Dumbledore and Harry work together to uncover the full and complex story of a boy once named Tom Riddle—the boy who became Lord Voldemort. Like Harry, he was the son of one Muggle-born and one Wizarding parent, raised unloved, and a speaker of Parseltongue. But the similarities end there, as the teenaged Riddle became deeply interested in the Dark objects known as Horcruxes: objects in which a wizard can hide part of his soul, if he dares splinter that soul through murder.\r\n\r\nHarry must use all the tools at his disposal to draw a final secret out of one of Riddle’s teachers, the sly Potions professor Horace Slughorn. Finally Harry and Dumbledore hold the key to the Dark Lord’s weaknesses... until a shocking reversal exposes Dumbledore’s own vulnerabilities, and casts Harry’s—and Hogwarts’s—future in shadow.', '2005-07-16', 100, 6, 'Harry Potter', 'Scholastic Inc.', 'J.K Rowling', 'https://i.gr-assets.com/images/S/compressed.photo.goodreads.com/books/1361039191l/1.jpg', 0, '2019-09-17 14:33:24'),
(9780451526342, 'Animal Farm', 'A farm is taken over by its overworked, mistreated animals. With flaming idealism and stirring slogans, they set out to create a paradise of progress, justice, and equality. Thus the stage is set for one of the most telling satiric fables ever penned-a razor-edged fairy tale for grown-ups that records the evolution from revolution against tyranny to a totalitarianism just as terrible. When Animal Farm was first published fifty years ago, Stalinist Russia was seen as its target. Today it is devastatingly clear that wherever an whenever freedom is attacked, under whatever banner, the cutting clarity and savage comedy of George Orwell\'s masterpiece has meaning and message still ferociously fresh.', '1945-08-17', 50, NULL, NULL, 'Mass Market Paperback', 'George Orwell', 'https://i.gr-assets.com/images/S/compressed.photo.goodreads.com/books/1345236959l/13456059.jpg', 139, '2019-10-29 01:12:16'),
(9780545010221, ' Harry Potter and the Deathly Hallows ', ' Harry Potter is leaving Privet Drive for the last time. But as he climbs into the sidecar of Hagrid’s motorbike and they take to the skies, he knows Lord Voldemort and the Death Eaters will not be far behind.\r\n\r\nThe protective charm that has kept him safe until now is broken. But the Dark Lord is breathing fear into everything he loves. And he knows he can’t keep hiding.\r\n\r\nTo stop Voldemort, Harry knows he must find the remaining Horcruxes and destroy them.\r\n\r\nHe will have to face his enemy in one final battle.', '2007-07-21', 100, 7, 'Harry Potter', 'Scholastic Inc.', 'J.K Rowling', 'https://i.gr-assets.com/images/S/compressed.photo.goodreads.com/books/1474171184l/136251._SY475_.jpg', 0, '2019-09-17 14:33:24'),
(9780553296983, 'The Diary of a Young Girl', ' Discovered in the attic in which she spent the last years of her life, Anne Frank’s remarkable diary has become a world classic—a powerful reminder of the horrors of war and an eloquent testament to the human spirit.\r\n\r\nIn 1942, with the Nazis occupying Holland, a thirteen-year-old Jewish girl and her family fled their home in Amsterdam and went into hiding. For the next two years, until their whereabouts were betrayed to the Gestapo, the Franks and another family lived cloistered in the “Secret Annexe” of an old office building. Cut off from the outside world, they faced hunger, boredom, the constant cruelties of living in confined quarters, and the ever-present threat of discovery and death. In her diary Anne Frank recorded vivid impressions of her experiences during this period. By turns thoughtful, moving, and surprisingly humorous, her account offers a fascinating commentary on human courage and frailty and a compelling self-portrait of a sensitive and spirited young woman whose promise was tragically cut short.', '1947-06-25', 100, NULL, NULL, 'Bantam', 'Anne Frank', 'https://i.gr-assets.com/images/S/compressed.photo.goodreads.com/books/1560816565l/48855.jpg', 0, '2019-09-17 14:33:24'),
(9781786491046, 'Admin Rambling', 'Rambling of the admins', '2017-01-01', 0.5, 1, 'Admin Rambles', 'admin_publisher', 'admin_author', NULL, 0, '2019-09-17 14:33:24'),
(9781786491047, 'Ramblers', 'Why do we ramble?', '2018-01-01', 0.5, 2, 'Admin Rambles', 'admin_publisher', 'admin_author', NULL, 0, '2019-09-17 14:33:24'),
(9781786491048, 'I Quit', 'Can\'t stand them anymore', '2019-01-01', 0.5, 3, 'Admin Rambles', 'admin_publisher', 'admin_author', NULL, 0, '2019-09-17 14:33:24');

-- --------------------------------------------------------

--
-- Table structure for table `is_tagged`
--
-- Creation: Aug 30, 2019 at 04:59 AM
--

CREATE TABLE `is_tagged` (
  `id` int(11) NOT NULL,
  `isbn` bigint(13) NOT NULL,
  `tag` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- RELATIONSHIPS FOR TABLE `is_tagged`:
--   `tag`
--       `tag` -> `name`
--   `isbn`
--       `book` -> `isbn`
--

--
-- Dumping data for table `is_tagged`
--

INSERT INTO `is_tagged` (`id`, `isbn`, `tag`) VALUES
(1, 9781786491046, 'ramblings'),
(2, 9780439554930, 'Fantasy'),
(3, 9780439554930, 'Young Adult'),
(4, 9780439554930, 'Fiction'),
(5, 9781786491048, 'ramblings'),
(6, 9781786491047, 'ramblings'),
(7, 9780439139601, 'Fantasy'),
(8, 9780439139601, 'Young Adult'),
(9, 9780439139601, 'Fiction'),
(10, 9780439655484, 'Fantasy'),
(11, 9780439655484, 'Fiction'),
(12, 9780439655484, 'Young Adult'),
(13, 9780439064866, 'Fantasy'),
(14, 9780439064866, 'Fiction'),
(15, 9780439064866, 'Young Adult'),
(16, 9780553296983, 'History'),
(17, 9780553296983, 'Classics'),
(18, 9780553296983, 'Non-fiction'),
(19, 9780553296983, 'Memoir'),
(20, 9780545010221, 'Young Adult'),
(21, 9780545010221, 'Fantasy'),
(22, 9780545010221, 'Fiction'),
(23, 9780439358071, 'Fantasy'),
(24, 9780439358071, 'Young Adult'),
(25, 9780439358071, 'Fiction'),
(26, 9780439785969, 'Fantasy'),
(27, 9780439785969, 'Young Adult'),
(28, 9780439785969, 'Fiction');

-- --------------------------------------------------------

--
-- Table structure for table `publisher`
--
-- Creation: Oct 28, 2019 at 07:37 PM
--

CREATE TABLE `publisher` (
  `name` varchar(50) NOT NULL,
  `address` text,
  `contact` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- RELATIONSHIPS FOR TABLE `publisher`:
--

--
-- Dumping data for table `publisher`
--

INSERT INTO `publisher` (`name`, `address`, `contact`) VALUES
('admin_publisher', 'Admin\'s publishing stuff', '8250504694'),
('Bantam', 'US', '100'),
('Mass Market Paperback', 'localhost', '154'),
('Scholastic Inc.', NULL, '8050504695');

-- --------------------------------------------------------

--
-- Table structure for table `series`
--
-- Creation: Sep 07, 2019 at 07:59 PM
--

CREATE TABLE `series` (
  `title` varchar(30) NOT NULL,
  `picture` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `author` varchar(15) NOT NULL,
  `publisher` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- RELATIONSHIPS FOR TABLE `series`:
--   `author`
--       `author` -> `name`
--   `publisher`
--       `publisher` -> `name`
--

--
-- Dumping data for table `series`
--

INSERT INTO `series` (`title`, `picture`, `description`, `author`, `publisher`) VALUES
('Admin Rambles', '', 'Rambling by different sysadmins, db admins and network admins', 'admin_author', 'admin_publisher'),
('Harry Potter', 'https://i.gr-assets.com/images/S/compressed.photo.goodreads.com/books/1456894457l/8933944.jpg', 'Orphan Harry learns he is a wizard on his 11th birthday when Hagrid escorts him to magic-teaching Hogwarts School. As a baby, his mother\'s love protected him and vanquished the villain Voldemort, leaving the child famous as \"The Boy who Lived\". With his friends Hermione and Ron, Harry has to defeat the returned \"He Who Must Not Be Named\". ', 'J.K Rowling', 'Scholastic Inc.');

-- --------------------------------------------------------

--
-- Table structure for table `tag`
--
-- Creation: Sep 02, 2019 at 06:25 AM
--

CREATE TABLE `tag` (
  `name` varchar(20) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- RELATIONSHIPS FOR TABLE `tag`:
--

--
-- Dumping data for table `tag`
--

INSERT INTO `tag` (`name`, `description`) VALUES
('Classics', 'A classic has a certain universal appeal. Great works of literature touch us to our very core beings--partly because they integrate themes that are understood by readers from a wide range of backgrounds and levels of experience. Themes of love, hate, death, life, and faith touch upon some of our most basic emotional responses.\r\n\r\nAlthough the term is often associated with the Western canon, it can be applied to works of literature from all traditions, such as the Chinese classics or the Indian Vedas.'),
('Fantasy', ' Fantasy is a genre that uses magic and other supernatural forms as a primary element of plot, theme, and/or setting. Fantasy is generally distinguished from science fiction and horror by the expectation that it steers clear of technological and macabre themes, respectively, though there is a great deal of overlap between the three (collectively known as speculative fiction or science fiction/fantasy)\r\n\r\nIn its broadest sense, fantasy comprises works by many writers, artists, filmmakers, and musicians, from ancient myths and legends to many recent works embraced by a wide audience today, including young adults, most of whom are represented by the works below.'),
('Fiction', 'Fiction is the telling of stories which are not real. More specifically, fiction is an imaginative form of narrative, one of the four basic rhetorical modes. Although the word fiction is derived from the Latin fingo, fingere, finxi, fictum, \"to form, create\", works of fiction need not be entirely imaginary and may include real people, places, and events. Fiction may be either written or oral. Although not all fiction is necessarily artistic, fiction is largely perceived as a form of art or entertainment. The ability to create fiction and other artistic works is considered to be a fundamental aspect of human culture, one of the defining characteristics of humanity.'),
('History', ' History (from Greek ἱστορία - historia, meaning \"inquiry, knowledge acquired by investigation\") is the discovery, collection, organization, and presentation of information about past events. History can also mean the period of time after writing was invented. Scholars who write about history are called historians. It is a field of research which uses a narrative to examine and analyse the sequence of events, and it sometimes attempts to investigate objectively the patterns of cause and effect that determine events. Historians debate the nature of history and its usefulness. This includes discussing the study of the discipline as an end in itself and as a way of providing \"perspective\" on the problems of the present. The stories common to a particular culture, but not supported by external sources (such as the legends surrounding King Arthur) are usually classified as cultural heritage rather than the \"disinterested investigation\" needed by the discipline of history. Events of the past prior to written record are considered prehistory.\r\nAmongst scholars, the fifth century BC Greek historian Herodotus is considered to be the \"father of history\", and, along with his contemporary Thucydides, forms the foundations for the modern study of history. Their influence, along with other historical traditions in other parts of their world, have spawned many different interpretations of the nature of history which has evolved over the centuries and are continuing to change. The modern study of history has many different fields including those that focus on certain regions and those which focus on certain topical or thematical elements of historical investigation. Often history is taught as part of primary and secondary education, and the academic study of history is a major discipline in University studies.'),
('Journalism', ' reporting on news and current events '),
('Memoir', 'As a literary genre, a memoir (from the French: mémoire from the Latin memoria, meaning \"memory\", or a reminiscence), forms a subclass of autobiography – although the terms \'memoir\' and \'autobiography\' are almost interchangeable in modern parlance. Memoir is autobiographical writing, but not all autobiographical writing follows the criteria for memoir.\r\n\r\nMemoirs are structured differently from formal autobiographies which tend to encompass the writer\'s entire life span, focusing on the development of his/her personality. The chronological scope of memoir is determined by the work\'s context and is therefore more focused and flexible than the traditional arc of birth to childhood to old age as found in an autobiography.\r\n\r\nMemoirs tended to be written by politicians or people in court society, later joined by military leaders and businessmen, and often dealt exclusively with the writer\'s careers rather than their private life. Historically, memoirs have dealt with public matters, rather than personal. Many older memoirs contain little or no information about the writer, and are almost entirely concerned with other people. Modern expectations have changed this, even for heads of government. Like most autobiographies, memoirs are generally written from the first person point of view.\r\n\r\nGore Vidal, in his own memoir Palimpsest, gave a personal definition: \"a memoir is how one remembers one\'s own life, while an autobiography is history, requiring research, dates, facts double-checked.\" It is more about what can be gleaned from a section of one\'s life than about the outcome of the life as a whole.\r\n\r\nHumorist Will Rogers put it a little more pithily: \"Memoirs means when you put down the good things you ought to have done and leave out the bad ones you did do.\"'),
('Non-fiction', 'Nonfiction is an account or representation of a subject which is presented as fact. This presentation may be accurate or not; that is, it can give either a true or a false account of the subject in question. However, it is generally assumed that the authors of such accounts believe them to be truthful at the time of their composition. Note that reporting the beliefs of others in a nonfiction format is not necessarily an endorsement of the ultimate veracity of those beliefs, it is simply saying that it is true that people believe that (for such topics as mythology, religion). Nonfiction can also be written about fiction, giving information about these other works.\r\n\r\nNonfiction is one of the two main divisions in writing, particularly used in libraries, the other being fiction. However, nonfiction need not be written text necessarily, since pictures and film can also purport to present a factual account of a subject'),
('Politics', ' Politics (from Greek πολιτικός, \"of, for, or relating to citizens\"), is a process by which groups of people make collective decisions. The term is generally applied to the art or science of running governmental or state affairs. It also refers to behavior within civil governments. However, politics can be observed in other group interactions, including corporate, academic, and religious institutions. It consists of \"social relations involving authority or power\" and refers to the regulation of public affairs within a political unit, and to the methods and tactics used to formulate and apply policy.'),
('ramblings', 'Admin ramblings'),
('Young Adult', ' Young-adult fiction (often abbreviated as YA) is fiction written for, published for, or marketed to adolescents and young adults, roughly ages 13 to 18.\r\n\r\nYoung-adult fiction, whether in the form of novels or short stories, has distinct attributes that distinguish it from the other age categories of fiction. The vast majority of YA stories portray an adolescent as the protagonist, rather than an adult or a child. The subject matter and story lines are typically consistent with the age and experience of the main character, but beyond that YA stories span the entire spectrum of fiction genres. The settings of YA stories are limited only by the imagination and skill of the author.\r\n\r\nThemes in YA stories often focus on the challenges of youth, so much so that the entire age category is sometimes referred to as problem novels or coming of age novel. Writing styles of YA stories range widely, from the richness of literary style to the clarity and speed of the unobtrusive. Despite its unique characteristics, YA shares the fundamental elements of fiction with other stories: character, plot, setting, theme, and style.');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `author`
--
ALTER TABLE `author`
  ADD PRIMARY KEY (`name`);

--
-- Indexes for table `book`
--
ALTER TABLE `book`
  ADD PRIMARY KEY (`isbn`),
  ADD KEY `author` (`author`),
  ADD KEY `publisher` (`publisher`),
  ADD KEY `series` (`series`);

--
-- Indexes for table `is_tagged`
--
ALTER TABLE `is_tagged`
  ADD PRIMARY KEY (`id`),
  ADD KEY `isbn` (`isbn`),
  ADD KEY `tag` (`tag`);

--
-- Indexes for table `publisher`
--
ALTER TABLE `publisher`
  ADD PRIMARY KEY (`name`) USING BTREE;

--
-- Indexes for table `series`
--
ALTER TABLE `series`
  ADD PRIMARY KEY (`title`),
  ADD KEY `author` (`author`),
  ADD KEY `publisher` (`publisher`);

--
-- Indexes for table `tag`
--
ALTER TABLE `tag`
  ADD PRIMARY KEY (`name`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `is_tagged`
--
ALTER TABLE `is_tagged`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `book`
--
ALTER TABLE `book`
  ADD CONSTRAINT `book_ibfk_1` FOREIGN KEY (`author`) REFERENCES `author` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `book_ibfk_2` FOREIGN KEY (`publisher`) REFERENCES `publisher` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `book_ibfk_3` FOREIGN KEY (`series`) REFERENCES `series` (`title`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `is_tagged`
--
ALTER TABLE `is_tagged`
  ADD CONSTRAINT `is_tagged_ibfk_2` FOREIGN KEY (`tag`) REFERENCES `tag` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `is_tagged_ibfk_3` FOREIGN KEY (`isbn`) REFERENCES `book` (`isbn`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `series`
--
ALTER TABLE `series`
  ADD CONSTRAINT `series_ibfk_1` FOREIGN KEY (`author`) REFERENCES `author` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `series_ibfk_2` FOREIGN KEY (`publisher`) REFERENCES `publisher` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
