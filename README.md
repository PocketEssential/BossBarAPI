# BossBarAPI
API to send BossBar Titles / Messages




### BossBarAPI

```php
// First you"ll need this
$BossBarAPI = $this->getServer()->getPluginManager()->getPlugin("BossBarAPI");

// You can also do:

use PocketEssential\BossBarAPI\BossBarAPI;
```

#### Sending  BossBars to players

```php

/*
 Player should an instance of a PLAYER, Just foreach loop all the online players; etc
 */

$message = "This is a BossBar message";
$BossBarAPI->sendBossBar(PLayer $player, $message);


  }
```
