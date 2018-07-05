$showbiz = new Tag();
$showbiz->setSlug('showbiz');
$showbiz->setName('Шоу-бизнес');

$business = new Tag();
$business->setSlug('business');
$business->setName('Новости бизнеса');

$ukraine = new Tag();
$ukraine->setSlug('ukraine');
$ukraine->setName('Новости Украины');

$tech = new Tag();
$tech->setSlug('tech');
$tech->setName('Наука и медицина');

$sport = new Tag();
$sport->setSlug('sport');
$sport->setName('Спорт');

$world = new Tag();
$world->setSlug('world');
$world->setName('В мире');

$kyiv = new Tag();
$kyiv->setSlug('kyiv');
$kyiv->setName('Новости Киева');

$lifestyle = new Tag();
$lifestyle->setSlug('lifestyle');
$lifestyle->setName('Мода');

$good_news = new Tag();
$good_news->setSlug('good_news');
$good_news->setName('Хорошие новости');

$strange = new Tag();
$strange->setSlug('strange');
$strange->setName('Странности');

$incidents = new Tag();
$incidents->setSlug('incidents');
$incidents->setName('Происшествия');

$project = new Project();
$project->setDomain('korrespondent.net');
$project->setName('Korrespondent.net');

$showbizChannel = new Project\Channel($showbiz, $project);
$showbizChannel->setUrl('http://k.img.com.ua/rss/ru/showbiz.xml');
$showbizChannel->setName($showbiz->getName());

$businessChannel = new Project\Channel($business, $project);
$businessChannel->setUrl('http://k.img.com.ua/rss/ru/business.xml');
$businessChannel->setName($business->getName());

$ukraineChannel = new Project\Channel($ukraine, $project);
$ukraineChannel->setUrl('http://k.img.com.ua/rss/ru/ukraine.xml');
$ukraineChannel->setName($ukraine->getName());

$incidentsChannel = new Project\Channel($incidents, $project);
$incidentsChannel->setUrl('http://k.img.com.ua/rss/ru/magnolia.xml');
$incidentsChannel->setName($incidents->getName());

$techChannel = new Project\Channel($tech, $project);
$techChannel->setUrl('http://k.img.com.ua/rss/ru/tech.xml');
$techChannel->setName($tech->getName());

$sportChannel = new Project\Channel($sport, $project);
$sportChannel->setUrl('http://k.img.com.ua/rss/ru/sport.xml');
$sportChannel->setName($sport->getName());

$worldChannel = new Project\Channel($world, $project);
$worldChannel->setUrl('http://k.img.com.ua/rss/ru/world.xml');
$worldChannel->setName($world->getName());

$kyivChannel = new Project\Channel($kyiv, $project);
$kyivChannel->setUrl('http://k.img.com.ua/rss/ru/kyiv.xml');
$kyivChannel->setName($kyiv->getName());

$lifestyleChannel = new Project\Channel($lifestyle, $project);
$lifestyleChannel->setUrl('http://k.img.com.ua/rss/ru/lifestyle.xml');
$lifestyleChannel->setName($lifestyle->getName());

$good_newsChannel = new Project\Channel($good_news, $project);
$good_newsChannel->setUrl('http://k.img.com.ua/rss/ru/good_news.xml');
$good_newsChannel->setName($good_news->getName());

$strangeChannel = new Project\Channel($strange, $project);
$strangeChannel->setUrl('http://k.img.com.ua/rss/ru/strange.xml');
$strangeChannel->setName($strange->getName());

$project->addChannel($showbizChannel);
$project->addChannel($businessChannel);
$project->addChannel($ukraineChannel);
$project->addChannel($incidentsChannel);
$project->addChannel($techChannel);
$project->addChannel($sportChannel);
$project->addChannel($worldChannel);
$project->addChannel($kyivChannel);
$project->addChannel($lifestyleChannel);
$project->addChannel($good_newsChannel);
$project->addChannel($strangeChannel);

$this->projectRepository->getEntityManager()->persist($project);
$this->projectRepository->getEntityManager()->flush();



$tagRepository = $this->dependency->getProjectRepository()->getEntityManager()->getRepository(Tag::class);

$ukraine = $tagRepository->findOneBy(['slug' => 'ukraine']);
$world = $tagRepository->findOneBy(['slug' => 'world']);
$crime = $tagRepository->findOneBy(['slug' => 'crime']);
$tech = $tagRepository->findOneBy(['slug' => 'tech']);
$sport = $tagRepository->findOneBy(['slug' => 'sport']);
$lifestyle = $tagRepository->findOneBy(['slug' => 'lifestyle']);
$business = $tagRepository->findOneBy(['slug' => 'business']);
$strange = $tagRepository->findOneBy(['slug' => 'strange']);

$politics = new Tag();
$politics->setSlug('politics');
$politics->setName('Политика');

$health = new Tag();
$health->setSlug('health');
$health->setName('Здоровье');

$society = new Tag();
$society->setSlug('society');
$society->setName('Общество');

$culture = new Tag();
$culture->setSlug('culture');
$culture->setName('Культура');

$project = new Project();
$project->setDomain('fakty.ua');
$project->setName('«Факты»');

$ukraineChannel = new Project\Channel($ukraine, $project);
$ukraineChannel->setUrl('http://fakty.ua/rss_feed/ukraina');
$ukraineChannel->setName($ukraine->getName());

$worldChannel = new Project\Channel($world, $project);
$worldChannel->setUrl('http://fakty.ua/rss_feed/world');
$worldChannel->setName($world->getName());

$politicsChannel = new Project\Channel($politics, $project);
$politicsChannel->setUrl('http://fakty.ua/rss_feed/politics');
$politicsChannel->setName($politics->getName());

$crimeChannel = new Project\Channel($crime, $project);
$crimeChannel->setUrl('http://fakty.ua/rss_feed/crime');
$crimeChannel->setName($crime->getName());

$healthChannel = new Project\Channel($health, $project);
$healthChannel->setUrl('http://fakty.ua/rss_feed/health');
$healthChannel->setName($health->getName());

$techChannel = new Project\Channel($tech, $project);
$techChannel->setUrl('http://fakty.ua/rss_feed/science');
$techChannel->setName($tech->getName());

$sportChannel = new Project\Channel($sport, $project);
$sportChannel->setUrl('http://fakty.ua/rss_feed/sport');
$sportChannel->setName($sport->getName());

$lifestyleChannel = new Project\Channel($lifestyle, $project);
$lifestyleChannel->setUrl('http://fakty.ua/rss_feed/style');
$lifestyleChannel->setName($lifestyle->getName());

$societyChannel = new Project\Channel($society, $project);
$societyChannel->setUrl('http://fakty.ua/rss_feed/society');
$societyChannel->setName($society->getName());

$cultureChannel = new Project\Channel($culture, $project);
$cultureChannel->setUrl('http://fakty.ua/rss_feed/culture');
$cultureChannel->setName($culture->getName());

$businessChannel = new Project\Channel($business, $project);
$businessChannel->setUrl('http://fakty.ua/rss_feed/money');
$businessChannel->setName($business->getName());

$strangeChannel = new Project\Channel($strange, $project);
$strangeChannel->setUrl('http://fakty.ua/rss_feed/life-stories');
$strangeChannel->setName($strange->getName());

$project->addChannel($ukraineChannel);
$project->addChannel($worldChannel);
$project->addChannel($politicsChannel);
$project->addChannel($crimeChannel);
$project->addChannel($healthChannel);
$project->addChannel($techChannel);
$project->addChannel($sportChannel);
$project->addChannel($lifestyleChannel);
$project->addChannel($societyChannel);
$project->addChannel($cultureChannel);
$project->addChannel($businessChannel);
$project->addChannel($strangeChannel);

$this->dependency->getProjectRepository()->getEntityManager()->persist($project);
$this->dependency->getProjectRepository()->getEntityManager()->flush();
