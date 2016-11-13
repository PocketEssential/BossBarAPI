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
 Player should an instance of PLAYER, and also the player that you
 Want the BossBar to be sent to, You can also foreach all the online
 players
 */

$message = "This is a BossBar message";
$BossBarAPI->sendBossBar($player, $message);

/*
  Sending it to all the players
*/

foeach($this->getServer()->getOnlinePlayers() as $player){

$message = "This is a BossBar message";
 $BossBarAPI->sendBossBar($player, $message);
  }
```
