-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 11, 2019 at 01:05 AM
-- Server version: 10.0.38-MariaDB
-- PHP Version: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rumahjua_book`
--

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `id` int(15) NOT NULL,
  `title` varchar(75) NOT NULL,
  `author` varchar(30) NOT NULL,
  `age` varchar(30) NOT NULL,
  `special` varchar(30) NOT NULL,
  `gender` varchar(15) NOT NULL,
  `theme` varchar(50) NOT NULL,
  `format` varchar(20) NOT NULL,
  `isbn` varchar(16) NOT NULL,
  `publisher` varchar(30) NOT NULL,
  `published` date NOT NULL,
  `price` float(9,2) UNSIGNED NOT NULL DEFAULT '0.00',
  `stock` int(11) NOT NULL,
  `description` text,
  `image` varchar(40) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`id`, `title`, `author`, `age`, `special`, `gender`, `theme`, `format`, `isbn`, `publisher`, `published`, `price`, `stock`, `description`, `image`) VALUES
(1, 'My Dog Gets a Job', 'Fensham Elizabeth', '8 - 10, 10 - 12, 12++', 'new', 'Boys&Girls', 'Animals, Humour', 'Paperback', '9780702259593', 'UQP', '2017-06-01', 14.95, 65452, 'My Dog Gets a Job picks up where the very successful My Dog Doesn\'t Like Me left off. At almost ten years of age, Eric is now the responsible owner of his dog Ugly. But when Ugly is involved in a series of mishaps including the theft of a roast chook and a bedroom decorated with duck poo, it is clear Eric needs to do something to keep his dog out of trouble. Luckily, Eric knows exactly how to solve the problem... Ugly needs a job. But how can Eric find a job for a dog, even if his dog is a genius? Humorous and engaging, My Dog Gets a Job will appeal to pet lovers of all ages.', 'new1.png'),
(2, 'Lexi and Lottie 2: Art for Art\'s Sake', 'Alexander Goldie', '6 - 8, 8 - 10', 'new', 'Boys&Girls', 'Family, Mystery, Siblings', 'Paperback', '9780143784166', 'Random house', '2017-06-01', 12.99, 45644, 'An artist gorilla, a sneaky impostor and an unlikely twist. The trusty Twin Detectives are on the case! Camilla the gorilla who lives at Appleton Animal Park loves to paint and her colourful canvases are proudly displayed outside her enclosure. But when someone steals her paintings, Camilla starts refusing to eat. Lexi and Lottie along with Fred and their trusty sidekick Mozart soon find the artworks for sale in a local gallery, but can’t prove they were painted by the gorilla. So, with Camilla’s well-being in mind, the Twin Detectives take extreme action and use their identical appearances to try and reclaim the art. Can the Twin Detectives reunite Camilla the gorilla with her paintings and catch the art-dealing culprit?', 'new2.png'),
(3, 'Potty Mouth and Stoopid', 'Patterson James', '8 - 10, 10 - 12, 12++', 'new, promo', 'Boys&Girls', 'Bullying, Humour', 'Paperback', '9781784754198', 'Random house', '2017-06-01', 16.99, 0, 'David and his best friend Michael were tagged with awful nicknames way back in preschool when everyone did silly things. Fast-forward to seventh grade: \'Pottymouth\' and \'Stoopid\' are still stuck with the names – and everyone in school, including the teachers and their principal, believe the labels are true. So how do they go about changing everyone\'s minds? By turning their misery into megastardom on TV, of course! And this important story delivers more than just laughs – it shows that the worst bullying doesn\'t have to be physical, and that things will get better.', 'new3.png'),
(4, 'You\'re Welcome Universe', 'Gardner Whitney', '12++', 'new', 'Boys&Girls', 'Art, Coming of Age / Teen Issues', 'Hardback', '9780399551413', 'Random House', '2017-06-01', 29.99, 872, 'A vibrant, edgy, fresh new YA voice for fans of More Happy Than Not and Simon vs. the Homo Sapiens Agenda, packed with interior graffiti. When Julia finds a slur about her best friend scrawled across the back of the Kingston School for the Deaf, she covers it up with a beautiful (albeit illegal) graffiti mural. Her supposed best friend snitches, the principal expels her, and her two mothers set Julia up with a one-way ticket to a “mainstream” school in the suburbs, where she’s treated like an outcast as the only deaf student. The last thing she has left is her art, and not even Banksy himself could convince her to give that up. Out in the ’burbs, Julia paints anywhere she can, eager to claim some turf of her own. But Julia soon learns that she might not be the only vandal in town. Someone is adding to her tags, making them better, showing off—and showing Julia up in the process. She expected her art might get painted over by cops. But she never imagined getting dragged into a full-blown graffiti war. Told with wit and grit by debut author Whitney Gardner, who also provides gorgeous interior illustrations of Julia’s graffiti tags, You’re Welcome, Universe introduces audiences to a one-of-a-kind protagonist who is unabashedly herself no matter what life throws in her way.', 'new4.png'),
(5, 'Warren the 13th and the All-Seeing Eye', 'del Rio Tania', '8 - 10, 10 - 12, 12++', 'new', 'Boys&Girls', 'Adventure, Mystery', 'Hardback', '9781594748035', 'Random House', '2017-06-01', 26.99, 3445, 'Meet Warren the 13th, a cursed twelve-year-old Victorian bellhop who\'s terribly unlucky, yet perpetually optimistic, hard-working, and curious. Warren\'s pride and joy is his family\'s Warren Hotel, but he\'s been miserable ever since his evil Aunt Anaconda took over the management. Anaconda believes a mysterious treasure known as The All-Seeing Eye is hidden somewhere in the walls of the hotel, and she\'ll do anything to find it. If Warren wants to preserve his family\'s legacy, he\'ll need to find the treasure first - if the hotel\'s many strange and wacky guests don\'t beat him to it! This middle-grade adventure features gorgeous 2-color illustrations on every page and a lavish 2-column Victorian design. It\'s going to be a real beauty of a book!', 'new5.png'),
(6, 'Warren the 13th and the Whispering Woods', 'del Rio Tania', '8 - 10, 10 - 12, 12++', 'new', 'Boys&Girls', 'Adventure, Mystery', 'Hardback', '9781594749292', 'Random House', '2017-06-01', 26.99, 65785, 'This sequel to Warren the 13th and the All-Seeing Eye begins soon after the first book’s conclusion. Twelve-year-old Warren has learned that his beloved hotel can walk, and now it’s ferrying guests around the countryside, transporting tourists to strange and foreign destinations. But when an unexpected detour brings everyone into the dark and sinister Malwoods, Warren finds himself separated from his hotel and his friends—and racing after them on foot through a forest teeming with witches, snakes, talking trees, and mind-boggling riddles. Once again, you can expect stunning illustrations and gorgeous design from Will Staehle on every page—along with plenty of nonstop action and adventure!', 'new6.png'),
(7, 'Ballerina Dream', 'DePrince Michaela', '4 - 6, 6 - 8', 'new, promo', 'Boys&Girls', 'Cultural Diversity, Dance, Diversit', 'Paperback', '9780571329731', 'Allen & Unwin', '2017-06-01', 14.99, 5217, 'Beautifully illustrated and carefully adapted for a younger audience, this younger-reader edition of Michaela DePrince\'s memoir, Hope in a Ballet Shoe, is sure to capture your heart. One windy day, a magazine blew down the road. I reached out and caught it. A pretty picture of a woman was on the front cover of the magazine. She wore a short pink dress that stuck out around her in a circle. She looked very happy. At the age of three, Michaela DePrince found a photo of a ballerina that changed her life. She was living in an orphanage in Sierra Leone at the time, but was soon adopted by a family and brought to America. Michaela never forgot the photo of the dancer she once saw, and decided to make her dream of becoming a ballerina come true. She has been dancing ever since, and after a spell as a principal dancer in New York, now dances for the Dutch National Ballet in Amsterdam. Beautifully and gently illustrated by Ella Okstad, Ballerina Dreams is the younger-reader edition of Michaela DePrince\'s highly moving memoir, Hope in a Ballet Shoe.', 'new7.png'),
(8, 'Nanna\'s Button Tin', 'Wolfer Diane', '2 - 4, 4 - 6', 'new', 'Boys&Girls', 'Family, Grandparents', 'Hardback', '9781922077677', 'Walker Books Australia', '2017-06-01', 24.99, 77, 'I love nanna\'s button tin. It is full of stories. Nanna’s button tin is very special. It has buttons of all shapes and sizes and they all have a different story to tell. But today, one button in particular is needed. A button for teddy. A beautiful story about memories and the stories that shape a family. Gorgeous text by award-winning author Dianne Wolfer - perfectly depicting the relationship between and grandchild and nanna. Heather Potter\'s illustrations are full of emotion and warmth. A great way to introduce young readers to the idea of memory and storytelling.', 'new8.png'),
(9, 'I Love Science', 'Ignotofsky Rachel', '12++', 'new, promo', 'Boys&Girls', 'Activity, Science and Nature', 'Hardback', '9781607749806', 'Random House', '2017-06-01', 24.99, 223, 'Colourful and charmingly illustrated, the Women in Science Journal encourages young women and girls to ponder the world and the daily ins and outs of their lives. Opening with a short reference section that contains basic equations, the periodic table, basic HTML codes, and a measurement converter, the journal then invites the user to write and dream through writing prompts like, \"What is a challenge you\'ve overcome recently?\" and inspirational quotes from notable women who\'ve achieved greatness in the science, technology, mathematics, and engineering (STEM) fields, such as famous primatologist Jane Goodall\'s, \"Only when our clever brain and our human heart work together can we reach our full potential.', 'new9.png'),
(10, 'Snowy and Snuffles', 'Gardner Felicity', '2 - 4', 'best', 'Boys&Girls', 'Adventure, Family, Friendship', 'Paperback', '9780734413888', 'Hachette', '2013-08-01', 14.99, 338, 'Siblings Snowy and Snuffles do everything differently ... but they always do it together. Snowy and Snuffles are adorable wombat joeys. Snuffles is quiet; Snowy is loud. Snowy is messy; Snuffles is neat. Snuffles is always good, but Snowy just can’t help being naughty sometimes. Even though they don’t always get along, they’ll always be the very best of friends. ', 'best1.png'),
(11, 'Duck in a Truck in the Muck', 'Griffiths Andy', '6 - 8, 8 - 10', 'best', 'Boys&Girls', 'Humour', 'Paperback', '9781742614120', 'Pan Macmillan', '2014-10-01', 6.99, 671, 'Chuck the Duck\'s ice-cream truck is stuck in the muck! Can his friend Buck and his muck-sucking truck save the day? A rhyming story of friendship and fun that will delight Andy fans, especially beginner readers, accompanied by Terry Denton\'s energetically comic illustrations. This story first appeared in The Cat on the Mat is Flat, a collection of short stories. The original black and white illustrations are now in colour, and the story has been redesigned in a larger format. ', 'best2.png'),
(12, 'Hairy Maclary, Hat Tricks (hardback)', 'Dodd Lynley', '0 - 2, 2 - 4', 'best', 'Boys&Girls', 'Animals', 'Hardback', '9780143505273', 'Penguin', '2011-03-01', 19.99, 846, 'Hairy Maclary is off to the park. It\'s a blusterous day but he\'s ready to play. When he comes across a windblown wedding party, can he show off his remarkable retrieving skills? ', 'best3.png'),
(13, 'The Treasure Box', 'Wild Margaret', '6 - 8, 8 - 10, 10 - 12, 12++', 'best', 'Boys&Girls', 'Family, Grief, Historical, Migrants', 'Paperback', '9780143506904', 'Penguin', '2017-02-01', 14.99, 642, 'From two of our most talented picture-book creators comes this celebration of things that can\'t be destroyed by bombs or fire. A haunting and beautiful tale of the power of words, the importance of stories and the resilience of the human spirit. When the enemy bombed the library, everything burned. As war rages, Peter and his father flee their home, taking with them a treasure box that holds something more precious than jewels. They journey through mud and rain and long cold nights, and soon their survival becomes more important than any possessions they carry. But as the years go by, Peter never forgets the treasure box, and one day he returns to find it... \r\n\r\n', 'best4.png'),
(27, 'The Puffin Baby and Toddler Treasury', 'Various', '0 - 2, 2 - 4', 'staffpick', 'Boys&Girls', 'Nursery Rhymes', 'Hardback', '9780670878321', 'Penguin', '1998-07-01', 29.99, 25438, 'The Puffin Baby and Toddler Treasury is a timeless collection of favourite nursery rhymes, lullabies, poems and stories, featuring well-loved characters such as Spot, the Snowman and Beatrix Potter\'s Tom Kitten. Brought to life by some of the most talented children\'s illustrators, this treasury is perfect for sharing and an essential addition to any young child\'s bookshelf.', 's.jpg'),
(14, 'The Windy Farm (paperback)', 'Macleod Doug', '2 - 4, 4 - 6', 'best', 'Boys&Girls', 'Environment & Society, Humour', 'Paperback', '9781921504518', 'Working Title Press', '2015-07-01', 14.99, 340, 'Why would anyone want to live on a farm where the winds are so fierce that even the pigs are blown away? Fortunately Mum is a clever inventor and can think of one very good reason. The Windy Farm is a hilarious picture book with a very pertinent message about wind power and environmental sustainability, by one of Australia\'s favourite picture book teams. ', 'best5.png'),
(15, 'ABC: Touch and Feel', 'Dorling Kindersley', '0 - 2', 'best', 'Boys&Girls', 'Alphabet', 'Board', '9781409366317', 'Dorling Kindersley', '2013-07-01', 12.99, 78548, ' Learn all about the alphabet with touch and feel textures in this chunky board book Learn your ABC with the twinkly, bumpy, scaly, silky, sandy, sticky and shiny textures in a chunky package that will help your child discover all about the alphabet. A is for apple - but how does it feel? Touch the skin on C (for crocodile) - it\'s bumpy! Let their little hands roam, read it together - they\'ll learn as they play. These Touch and Feel chunky padded board books will help encourage your child\'s early learning and language. Perfect for encouraging tiny fingers to explore and great for sensory development.\r\n', 'best6.png'),
(28, 'Friends', 'Oxenbury Helen', '0 - 2', '', 'Boys&Girls', 'First Time Events', 'Hardback', '9781406340112', 'Walker Books Australia', '2013-09-01', 9.95, 3454, 'The reissue of a classic baby board book to celebrate Helen Oxenbury\'s great contribution to children\'s books. Babies make all kinds of friends - rabbits, dogs, guinea pigs, birds, cats, hens and ducks. ', 's2.jpg'),
(29, 'Happy and Sad', 'Lester Alison', '0 - 2', '', 'Boys&Girls', 'Feelings', 'Hardback', '9781741755091', 'Allen & Unwin', '2008-07-01', 9.95, 34543, '\'Baby is happy. Baby is sad. Baby is good. Baby is bad. Baby is brave. Baby is scared. Baby is grumpy. Baby\'s in bed.\' From patting the dog to making a mess in the kitchen and finally going to sleep, Alison Lester\'s board books are about everything a little person does in a day.\r\n ', 's3.jpg'),
(30, 'Dressing', 'Oxenbury Helen', '0 - 2', '', 'Boys&Girls', 'First Time Events', 'Hardback', '9780744537147', 'Walker Books Australia', '2008-07-01', 9.95, 5673, 'The reissue of a classic baby board book to celebrate Helen Oxenbury\'s great contribution to children\'s books. Babies wear all sorts of clothes - nappies, T-shirts, socks, trousers and hats.', 's4.jpg'),
(31, 'Bumping and Bouncing', 'Lester Alison', '0 - 2', '', 'Boys&Girls', 'Family', 'Hardback', '9781741755114 ', 'Allen & Unwin', '2008-07-01', 9.95, 34524, 'Bouncing in the barrow. Swinging through the sky. Rattling in the trolley. \r\nSwaying up so high. Bumping in the pusher. Splashing with our feet. Riding on the pony. \r\nSpeeding down the street.\' Outings to the garden, the supermarket, the pond, \r\nthe farm . . . Alison Lester\'s board books are about everything a little person does in a day.\r\n', 's5.jpg'),
(32, 'Working', 'Oxenbury Helen', '0 - 2', 'promo', 'Boys & Girls', 'First Time Events', 'Hardback', '9780671421120 ', 'Walker Books Australia', '2013-09-01', 9.95, 52345, 'The reissue of a classic baby board book to celebrate Helen Oxenbury\'s great contribution to children\'s books. Babies have lots of work to do - eating, using the potty, having a bath and sleeping.', 's6.jpg'),
(33, 'Why I Love My Mummy', 'Oxenbury Helen', '0 - 2, 2 - 4', '', 'Boys&Girls', 'Celebrations, Family, Mother\'s Day', 'Paperback', '9780007508655 ', 'Harper Collins', '2015-10-01', 14.95, 34534, 'Featuring children\'s own words and heart-warming pictures, this little book can be given by boys or girls to their mummy on mothers\' day. Or any time! A lovely gift book at a pocket-friendly price, created by asking real children why they love their mummies and combining their words with illustrations of gorgeous baby animals.\r\n', 's7.jpg'),
(19, 'Thunderstorm Dancing', 'Germein Kartrina', '2 - 4, 4 - 6', 'staffpick', 'Boys&Girls', 'Adventure, Family', 'Hardback', '9781743314593', 'Allen & Unwin', '2015-04-01', 24.99, 3452, 'When a sunny day at the beach turns stormy, a little girl runs for cover. Her daddy and brothers are wild in the wind and lightning, and her poppy is as loud as thunder. They fill the house with stamping and crashing while Granny plays piano to their riotous thunderstorm dancing... until the storm passes and they all fall down. Then, in the stillness, the girl is ready to play. What will she be, now that the rain has stopped and there\'s a glimmer of sunlight?', 'pick1.jpg'),
(34, 'When Charley Met Grandpa', 'Hest Amy', '2 - 4, 4 - 6 ', '', 'Boys&Girls', 'Animals, Family, Grandparents', 'Hardback', '9780763653149', 'Walker Books Australia', '2014-05-01', 16.95, 23452, 'Dear Grandpa... When are you coming to see Charley? Bring a big suitcase and stay a long time and I\'ll meet you at the station... Readers fell in love with Henry and his truly adorable new puppy, Charley, in Charley\'s First Night. In this beautiful follow-up title, Henry hopes - very much - that his granpa, who is coming for a visit, will love Charley just as much as he does (a LOT). But Granpa is a little wary of dogs ... he\'s never been friends with one before. Luckily, Charley isn\'t any ordinary little puppy, he\'s a very smart one and this could be the beginning of a very beautiful friendship indeed...', 'm.jpg'),
(35, 'We\'re Going on a Bear Hunt (board book)', 'Rosen Michael', '0 - 2, 2 - 4', '', 'Boys&Girls', 'Adventure', 'Hardback', '9780689853494', 'Walker Books Australia', '2015-08-01', 14.95, 5476, 'For brave hunters and bear-lovers, the classic chant-aloud by Michael Rosen and Helen Oxenbury in an enlarged edition. We\'re going on a bear hunt. We\'re going to catch a big one. Will you come too? For a quarter of a century, readers have been swishy-swashying and splash-sploshing through this award-winning favourite. Follow and join in the family\'s excitement as they wade through the grass, splash through the river and squelch through the mud in search of a bear. What a surprise awaits them in the cave on the other side of the dark forest!', 'm2.jpg'),
(36, 'We\'re Going On A Bear Hunt Pop Up Edition', 'Rosen Michael', '0 - 2, 2 - 4', 'promo', 'Boys&Girls', 'Adventure', 'Hardback', '9781416936657', 'Walker Books Australia', '2015-10-01', 29.95, 0, 'The award-winning classic brought to life as a pop-up adventure. We\'re going on a bear hunt. We\'re going to catch a big one. Will you come too? For a quarter of a century, readers have been swishy-swashying and splash-sploshing through this award-winning favourite and now it can be read in three glorious dimensions in this incredible pop-up edition featuring seven full-page pop-ups. Follow and join in the family\'s excitement as they wade through the grass, splash through the river and squelch through the mud in search of a bear. What a surprise awaits them in the cave on the other side of the dark forest! The award-winning classic brought to life as a pop-up adventure.', 'm3.jpg'),
(37, 'Eating Out', 'Oxenbury Helen', '2 - 4, 4 - 6', 'promo', 'Boys&Girls', 'First Time Events', 'Hardback', '9781406341508', 'Walker Books Australia', '2013-09-01', 11.95, 0, 'The reissue of a classic first storybook to celebrate Helen Oxenbury\'s work. Mum is too tired to cook so Dad offers to take the family out for supper. But the youngest person present can\'t sit still and has to go to the toilet at the wrong time. Then someone falls over him when he decides to hide under the table. A warm and funny depiction of a child\'s first trip to a restaurant - which quickly turns into a disaster. A classic by one of the world\'s most distinguished and celebrated children\'s book illustrators. An ideal way to start a lifelong love of books. Great to read aloud and appealing to beginning readers.', 'm4.jpg'),
(17, 'Proud to be Deaf', 'Beese Ava', '4 - 6, 6 - 8, 8 - 10', 'best, promo', 'Boys&Girls', 'Autobiography, Diversity', 'Hardback', '9781526302182', 'Hachette', '2017-06-01', 24.99, -2, 'A wonderful child-led book that celebrates Deaf culture and introduces readers to British Sign Language. Ava is like any other 7-year-old. She likes to talk and laugh with her friends, is obsessed with dogs and loves being active. Ava is also deaf - and she\'s proud of it. She loves her Deaf community, that she\'s bilingual, and that she experiences the world differently from hearing people. In this book, Ava welcomes her hearing peers to her daily life, the way technology helps her navigate the world and explains common misconceptions about deaf people - and introduces some of her deaf heroes who have achieved amazing things. She talks about her experiences at school making friends with hearing children, and teaches readers the BSL alphabet and BSL phrases. Featuring photos of Ava, her friends and family throughout, plus illustrations of hand signs.', 'best8.jpg'),
(24, 'This is a ball', 'Stanton Beck, Stanton Matt', '4 - 6, 6 - 8', 'staffpick, promo', 'Boys&Girls', 'Humour', 'Hardback', '9780316434379', 'Harper Collins', '2015-04-01', 19.99, 0, 'For the giggling masses who love Herve Tullet\'s modern classic PRESS HERE and BJ Novak\'s #1 NYT bestseller THE BOOK WITH NO PICTURES comes this brilliant Australian book that will frustrate ... and delight! For the Grown-Ups: You know how you\'re right all the time? All. The. Time. Yes, well, it\'s time to give the kids a turn. Which is why everything you read in this book is going to be wrong. But that\'s okay, because the kids are going to correct you. And they\'re going to love it!', 'pick6.png'),
(38, 'Captain Jack and the Pirates', 'Bently Peter', '2 - 4, 4 - 6', '', 'Boys&Girls', 'Humour', 'Hardback', '9780525429500', 'Penguin', '2016-06-01', 17.99, 0, 'A family day out at the beach turns into a swashbuckling pirate adventure as imaginations run wild in this timeless and classic picture book. From the creators of the internationally bestselling Kind Jack and the Dragon.', '1.jpg'),
(16, 'King of the Sky', 'Davies Nicola', '6 - 8, 8 - 10', 'best', 'Boys&Girls', 'Friendship, Migrants', 'Hardback', '9781406348613', 'Walker Books Australia', '2017-06-01', 24.99, 0, 'A powerful and beautifully illustrated story about migration and the meaning of home, from the award-winning team behind The Promise. A breathtaking new picture book by children\'s author Nicola Davies, illustrated by Laura Carlin, winner of the Bratislava Illustration Biennale and the Bologna Ragazzi Prize for Illustration. Starting a new life in a new country, a young boy feels lost and alone – until he meets an old man who keeps racing pigeons. Together they pin their hopes on a race across Europe and the special bird they believe can win it: King of the Sky. Nicola Davies’ beautiful story – an immigrant’s tale with a powerful resonance in our troubled times – is illustrated by an artist who makes the world anew with every picture. A musical adaptation of King of the Sky has already met with success on the stage, shown two years running at the Hay Festival and due to tour Welsh theatres next spring. Nicola Davies is a high-profile author who regularly visits schools and festivals, and has a big presence on social media. Mass displacement is one of the most important challenges we face. King of the Sky is endorsed by Amnesty International.', 'best7.jpg'),
(39, 'An Elephant and Piggie Book: My Friend is Sad', 'Willems Mo', '6 - 8', '', 'Boys&Girls', 'Friendship, Humour', 'Hardback', '9781423102977', 'Walker Books Australia', '2012-05-01', 11.95, 0, 'One of a series of delightfully humorous award-winning tales for beginner readers from an internationally acclaimed author-illustrator. Gerald is careful. Piggie is not. Piggie cannot help smiling. Gerald can. Gerald worries so that Piggie does not have to. Gerald and Piggie are best friends. In My Friend is Sad, Gerald is sad. How can Piggie be happy if Gerald is ad? Told entirely in speech bubbles with a repetitive use of familiar phrases, this highly original book is perfect for children just learning to read. Vibrant new edition with bright colours that will appeal to young readers. A Theodor Seuss Geisel Award-winning series for the most distinguished books for beginner readers. \"In the world of children\'s books, the biggest new talent to emerge thus far in the \'00s is the writer-illustrator Mo Willems.\" - The New York Times Book Review\r\n', 'xl.jpeg'),
(40, 'An Elephant and Piggie Book: I Am Invited to a Party!', 'Willems Mo', '6 - 8', '', 'Boys&Girls', 'Celebrations', 'Hardback', '9781423106876', 'Walker Books Australia', '2012-05-01', 11.95, 0, 'One of a series of delightfully humorous award-winning tales for beginner readers from an internationally acclaimed author-illustrator. Gerald is careful. Piggie is not. Piggie cannot help smiling. Gerald can. Gerald worries so that Piggie does not have to. Gerald and Piggie are best friends. In I am Invited to a Party!, Piggie is invited to her first party. But what will she wear? Gerald, the party expert, knows just how to help ... or does he? Told entirely in speech bubbles with a repetitive use of familiar phrases, this highly original book is perfect for children just learning to read. Vibrant new edition with bright colours that will appeal to young readers. A Theodor Seuss Geisel Award-winning series for the most distinguished books for beginner readers. \"In the world of children\'s books, the biggest new talent to emerge thus far in the \'00s is the writer-illustrator Mo Willems.\" - The New York Times Book Review\r\n', 'xl2.jpeg'),
(18, 'Turtles All the Way Down', 'Green John', '12++', 'best', 'Boys & Girls', 'Adventure, Friendship', 'Hardback', '9780525555360', 'Random House', '2016-10-01', 24.99, -1, 'The wait is over! John Green, the #1 bestselling author of The Fault in Our Stars, is back. It all begins with a fugitive billionaire and the promise of a cash reward. Turtles All the Way Down is about lifelong friendship, the intimacy of an unexpected reunion, Star Wars fan fiction, and tuatara. But at its heart is Aza Holmes, a young woman navigating daily existence within the ever-tightening spiral of her own thoughts. In his long-awaited return, John Green shares Aza’s story with shattering, unflinching clarity.', 'best9.jpg'),
(25, 'Seb and Hamish', 'Daly Jude', ' 2 - 4,4 - 6', 'staffpick', 'Boys & Girls', 'Animals', 'Hardback', '9781847804129', 'Walker Books Australia', '2014-04-01', 24.95, 0, '\r\n\r\nFAQ ++\r\nBook Description\r\nSeb and Mama go to visit Mrs Kenny, but there s a dog called Hamish at the house too. Woof woof, says Hamish. \"Home,\" says Seb in a little voice. While Mama and Mrs Kenny have tea, Hamish is shut in another room and Seb plays with his train set. He gets so absorbed he forgets all about Hamish - until a piece of his cookie slips under the door. Seb puts his finger through the gap, peeps under the door, and two gentle eyes look back at him. \"Hello, Hamish,\" says Seb. When it s time to go home, Mama looks everywhere for Seb. Where could he be? Seb and Hamish are found at last, curled up together, fast asleep!\r\n', 'pick7.png'),
(26, 'The Dot', 'Reynolds Peter H', '2 - 4,4 - 6,6 - 8', 'staffpick', 'Boys & Girls', 'Art,Feelings', 'Paperback', '9781844281695', 'Walker Books Australia', '2014-11-01', 16.99, 0, 'One little dot marks the beginning of Vashti\'s journey of surprise and self-discovery in Peter H. Reynolds\' multiple award-winning modern classic. In this inspiring, award-winning story of self-expression and creativity from Peter H. Reynolds, illustrator of Ish and the Judy Moody series, Vashti thinks she can\'t draw. But her teacher is sure that she can. She knows that there\'s creative spirit in everyone, and encourages Vashti to sign the angry dot she makes in frustration on a piece of paper. This act makes Vashti look at herself a little differently, and helps her discover that where there\'s a dot there\'s a way...With wit, charm and free-spirited illustrations, Peter H. Reynolds encourages even the stubbornly uncreative among us to make a mark - and follow where it takes us. ', 'pick8.png'),
(21, 'Sister Heart', 'Morgan Sally', '12++', 'staffpick, promo', 'Boys&Girls', 'Historical, Indigenous, Poetry', 'Hardback', '9781925163131', 'Fremantle Press', '2015-08-01', 19.99, 0, 'A young Aboriginal girl is taken from the north of Australia and sent to an institution in the distant south. There, she slowly makes a new life for herself and, in the face of tragedy, finds strength in new friendships. Poignantly told from the child\'s perspective, Sister Heart affirms the power of family and kinship.\r\n', 'pick3.jpg'),
(22, 'The Amazing True Story of How Babies Are Made', 'Katauskas Fiona', '6 - 12', 'staffpick', 'Boys&Girls', 'Babies', 'Hardback', '9780733333880', 'Harper Collins', '2015-08-01', 19.99, 0, 'THE AMAZING TRUE STORY OF HOW BABIES ARE MADE is Fiona\'s brilliant response to finding herself reading the same sex-ed book to her son as her mother had read to her. That book is, of course, Peter Mayle\'s 1973 bestseller, a classic picture book that has helped millions of parents and teachers around the world navigate those tricky questions about how babies are made. Fiona\'s book captures all the elements that made WHERE DID I COME FROM? such a success: it\'s funny, it\'s warm, it\'s straightforward and it\'s the perfect helping hand for carers. But things have changed since the seventies, and Fiona\'s book is exactly what modern parents have been waiting for!', 'pick4.jpg'),
(23, 'Talk Under Water', 'Lomer Kathryn', '12++', 'staffpick, promo', 'Boys&Girls', 'Diversity, Friendship, Romance', 'Paperback', '9780702253690', 'UQP', '2015-08-01', 20.00, 0, 'Will and Summer meet online and strike up a friendship based on coincidence. Summer lives in Will\'s old hometown, Kettering, a small Tasmanian coastal community. Summer isn\'t telling the whole truth about herself, but figures it doesn\'t matter if they never see each other in person, right? When Will returns to Kettering, the two finally meet and Summer can no longer hide her secret, she is deaf. Can Summer and Will find a way to be friends in person even though they speak a completely different language?', 'pick5.jpg'),
(20, 'The Flywheel', 'Gough Erin', '12++', 'staffpick', 'Boys & Girls', 'Friendship,LGBT,Romance', 'Paperback', '9781742978178', 'Hardie Grant Egmont', '2015-02-01', 19.95, 0, '\r\n\r\nSeventeen-year-old Delilah\'s crazy life is about to get crazier. Ever since her father took off overseas, she\'s been struggling to run the family\'s caf -- The Flywheel -- without him and survive high school. But after a misjudged crush on one of the cool girls, she\'s become the school punchline as well. With all that\'s on her plate she barely has time for her favourite distraction - spying on the beautiful Rosa, who dances flamenco at the tapas bar across the road. Only her best friend Charlie knows how she feels about Rosa, but he has romantic problems of his own. When his plan to win an older woman\'s heart goes horribly wrong, Del is the only one who can help Charlie stay out of jail.\r\n\r\nAll this leaves Del grappling with some seriously curly questions. Is it okay to break the law to help a friend? How can a girl tell another girl she likes her without it ending in humiliation and heartbreak? And - the big one - is it ever truly possible to dance in public without falling over?\r\n', 'pick2.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `cid` int(11) NOT NULL,
  `message` text NOT NULL,
  `sys_time` varchar(30) NOT NULL,
  `user_cid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`cid`, `message`, `sys_time`, `user_cid`) VALUES
(1, 'afsdghfdgsfadsdg', '2017-06-29 00:20:27', 0);

-- --------------------------------------------------------

--
-- Table structure for table `guest_comment`
--

CREATE TABLE `guest_comment` (
  `cid` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `message` text NOT NULL,
  `sys_time` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `guest_comment`
--

INSERT INTO `guest_comment` (`cid`, `name`, `email`, `message`, `sys_time`) VALUES
(1, 'abcde', '0', '0', '2017'),
(2, 'abcde', 'abc@yahoo.com', '34tyuhgrwd', '2017-06-27 20:45:19'),
(3, 'asdfsdfas', 'abc@yahoo.com', 'asdfjkjasdkfasjdf', '2017-06-30 10:42:44');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `cid` int(11) NOT NULL,
  `purchase_cid` int(11) NOT NULL,
  `paid` varchar(100) NOT NULL,
  `sys_time` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`cid`, `purchase_cid`, `paid`, `sys_time`) VALUES
(1, 30, '', '2017-06-30 18:16:20'),
(2, 31, '14.99 ', '2017-06-30 18:21:13');

-- --------------------------------------------------------

--
-- Table structure for table `purchase`
--

CREATE TABLE `purchase` (
  `cid` int(11) NOT NULL,
  `user_cid` int(11) NOT NULL,
  `books_cid` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `sys_time` varchar(30) NOT NULL,
  `sum_price` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `purchase`
--

INSERT INTO `purchase` (`cid`, `user_cid`, `books_cid`, `quantity`, `sys_time`, `sum_price`) VALUES
(32, 2, 4, 80, '2017-06-30 18:22:47', '2399.2'),
(33, 2, 11, 1, '2017-06-30 18:23:41', '6.99'),
(34, 2, 0, 1, '2017-06-30 18:34:21', '0'),
(35, 2, 0, 1, '2017-06-30 18:34:35', '0'),
(36, 2, 0, 6, '2017-06-30 18:34:51', '0'),
(37, 2, 27, 6, '2017-06-30 18:35:39', '179.94'),
(38, 2, 15, 1, '2017-06-30 18:38:37', '12.99'),
(39, 2, 15, 3, '2017-06-30 18:38:47', '38.97'),
(40, 2, 12, 1, '2017-06-30 18:41:38', '19.99'),
(42, 1, 15, 1, '2018-01-19 11:06:58', '12.99'),
(43, 1, 1, -1, '2018-01-19 11:07:05', '-14.95'),
(44, 1, 12, 1, '2018-01-23 11:06:03', '19.99');

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

CREATE TABLE `review` (
  `cid` int(11) NOT NULL,
  `review` text NOT NULL,
  `sys_time` varchar(30) NOT NULL,
  `books_cid` int(11) NOT NULL,
  `user_cid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `review`
--

INSERT INTO `review` (`cid`, `review`, `sys_time`, `books_cid`, `user_cid`) VALUES
(1, 'afdshdfhgsfdg', '2017-06-30 00:32:20', 0, 1),
(2, 'asfddfhgsafdfsdg', '2017-06-30 00:34:01', 24, 1),
(3, 'dsfasdfadsf', '2017-06-30 02:19:42', 27, 2),
(4, 'adfasdfadsf', '2017-06-30 02:19:58', 37, 2),
(5, 'adsfassdfassdf', '2017-06-30 02:22:27', 26, 1),
(6, 'asdfasdfssfdfhsgfdf', '2017-06-30 02:24:00', 7, 1),
(7, 'adfsdgfdfads', '2017-06-30 02:26:59', 26, 1),
(8, 'afadsfads', '2017-06-30 02:27:56', 26, 1),
(9, 'asdfasdfadsf', '2017-06-30 09:21:44', 15, 1),
(10, 'adsfasdf', '2017-06-30 09:22:10', 4, 1);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `cid` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `address` varchar(200) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `level` int(2) NOT NULL,
  `status` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`cid`);

--
-- Indexes for table `guest_comment`
--
ALTER TABLE `guest_comment`
  ADD PRIMARY KEY (`cid`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`cid`);

--
-- Indexes for table `purchase`
--
ALTER TABLE `purchase`
  ADD PRIMARY KEY (`cid`);

--
-- Indexes for table `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`cid`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`cid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=301;

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `cid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `guest_comment`
--
ALTER TABLE `guest_comment`
  MODIFY `cid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `cid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `purchase`
--
ALTER TABLE `purchase`
  MODIFY `cid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `review`
--
ALTER TABLE `review`
  MODIFY `cid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `cid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
