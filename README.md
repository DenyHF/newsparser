php bin/console app:project:parse -vvv
php bin/console app:queue:project:channel:parse -vvv

    $business = new Tag();
    $business->setSlug('business');
    $business->setName('Бизнес');

    $politics = new Tag();
    $politics->setSlug('politics');
    $politics->setName('Политика');

    $tech = new Tag();
    $tech->setSlug('tech');
    $tech->setName('Наука и технологии');

    $showbiz = new Tag();
    $showbiz->setSlug('showbiz');
    $showbiz->setName('Шоу-бизнес');

    $lifestyle = new Tag();
    $lifestyle->setSlug('lifestyle');
    $lifestyle->setName('Мода');

    $health = new Tag();
    $health->setSlug('health');
    $health->setName('Здоровье');

    $sport = new Tag();
    $sport->setSlug('sport');
    $sport->setName('Спорт');

    $society = new Tag();
    $society->setSlug('society');
    $society->setName('Общество');

    $culture = new Tag();
    $culture->setSlug('culture');
    $culture->setName('Культура');

    $strange = new Tag();
    $strange->setSlug('strange');
    $strange->setName('Странности');

    $crime = new Tag();
    $crime->setSlug('crime');
    $crime->setName('Происшествия');

    $good_news = new Tag();
    $good_news->setSlug('good_news');
    $good_news->setName('Хорошие новости');

    $world = new Tag();
    $world->setSlug('world');
    $world->setName('В мире');

    $ukraine = new Tag();
    $ukraine->setSlug('ukraine');
    $ukraine->setName('Новости Украины');

    $kyiv = new Tag();
    $kyiv->setSlug('kyiv');
    $kyiv->setName('Новости Киева');

    $korrespondent = new Project();
    $korrespondent->setDomain('korrespondent.net');
    $korrespondent->setName('Korrespondent.net');
    $this->dependency->getProjectRepository()->getEntityManager()->persist($korrespondent);

    $showbizChannel = new Project\Channel($showbiz, $korrespondent);
    $showbizChannel->setUrl('http://k.img.com.ua/rss/ru/showbiz.xml');

    $businessChannel = new Project\Channel($business, $korrespondent);
    $businessChannel->setUrl('http://k.img.com.ua/rss/ru/business.xml');

    $ukraineChannel = new Project\Channel($ukraine, $korrespondent);
    $ukraineChannel->setUrl('http://k.img.com.ua/rss/ru/ukraine.xml');

    $crimeChannel = new Project\Channel($crime, $korrespondent);
    $crimeChannel->setUrl('http://k.img.com.ua/rss/ru/magnolia.xml');

    $techChannel = new Project\Channel($tech, $korrespondent);
    $techChannel->setUrl('http://k.img.com.ua/rss/ru/tech.xml');

    $sportChannel = new Project\Channel($sport, $korrespondent);
    $sportChannel->setUrl('http://k.img.com.ua/rss/ru/sport.xml');

    $worldChannel = new Project\Channel($world, $korrespondent);
    $worldChannel->setUrl('http://k.img.com.ua/rss/ru/world.xml');

    $kyivChannel = new Project\Channel($kyiv, $korrespondent);
    $kyivChannel->setUrl('http://k.img.com.ua/rss/ru/kyiv.xml');

    $lifestyleChannel = new Project\Channel($lifestyle, $korrespondent);
    $lifestyleChannel->setUrl('http://k.img.com.ua/rss/ru/lifestyle.xml');

    $good_newsChannel = new Project\Channel($good_news, $korrespondent);
    $good_newsChannel->setUrl('http://k.img.com.ua/rss/ru/good_news.xml');

    $strangeChannel = new Project\Channel($strange, $korrespondent);
    $strangeChannel->setUrl('http://k.img.com.ua/rss/ru/strange.xml');

    $fakty = new Project();
    $fakty->setDomain('fakty.ua');
    $fakty->setName('«Факты»');
    $this->dependency->getProjectRepository()->getEntityManager()->persist($fakty);

    $fakty->addChannel($showbizChannel);
    $fakty->addChannel($businessChannel);
    $fakty->addChannel($ukraineChannel);
    $fakty->addChannel($crimeChannel);
    $fakty->addChannel($techChannel);
    $fakty->addChannel($sportChannel);
    $fakty->addChannel($worldChannel);
    $fakty->addChannel($kyivChannel);
    $fakty->addChannel($lifestyleChannel);
    $fakty->addChannel($good_newsChannel);
    $fakty->addChannel($strangeChannel);

    $ukraineChannel = new Project\Channel($ukraine, $fakty);
    $ukraineChannel->setUrl('http://fakty.ua/rss_feed/ukraina');

    $worldChannel = new Project\Channel($world, $fakty);
    $worldChannel->setUrl('http://fakty.ua/rss_feed/world');

    $politicsChannel = new Project\Channel($politics, $fakty);
    $politicsChannel->setUrl('http://fakty.ua/rss_feed/politics');

    $crimeChannel = new Project\Channel($crime, $fakty);
    $crimeChannel->setUrl('http://fakty.ua/rss_feed/crime');

    $healthChannel = new Project\Channel($health, $fakty);
    $healthChannel->setUrl('http://fakty.ua/rss_feed/health');

    $techChannel = new Project\Channel($tech, $fakty);
    $techChannel->setUrl('http://fakty.ua/rss_feed/science');

    $sportChannel = new Project\Channel($sport, $fakty);
    $sportChannel->setUrl('http://fakty.ua/rss_feed/sport');

    $lifestyleChannel = new Project\Channel($lifestyle, $fakty);
    $lifestyleChannel->setUrl('http://fakty.ua/rss_feed/style');

    $societyChannel = new Project\Channel($society, $fakty);
    $societyChannel->setUrl('http://fakty.ua/rss_feed/society');

    $cultureChannel = new Project\Channel($culture, $fakty);
    $cultureChannel->setUrl('http://fakty.ua/rss_feed/culture');

    $businessChannel = new Project\Channel($business, $fakty);
    $businessChannel->setUrl('http://fakty.ua/rss_feed/money');

    $strangeChannel = new Project\Channel($strange, $fakty);
    $strangeChannel->setUrl('http://fakty.ua/rss_feed/life-stories');

    $fakty->addChannel($ukraineChannel);
    $fakty->addChannel($worldChannel);
    $fakty->addChannel($politicsChannel);
    $fakty->addChannel($crimeChannel);
    $fakty->addChannel($healthChannel);
    $fakty->addChannel($techChannel);
    $fakty->addChannel($sportChannel);
    $fakty->addChannel($lifestyleChannel);
    $fakty->addChannel($societyChannel);
    $fakty->addChannel($cultureChannel);
    $fakty->addChannel($businessChannel);
    $fakty->addChannel($strangeChannel);

    $this->dependency->getProjectRepository()->getEntityManager()->flush();
