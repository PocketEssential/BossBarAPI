![image](https://proxy.spigotmc.org/fa1e0f4e4f92ce10eb7407f82f18847c87110f36?url=http%3A%2F%2Fi.imgur.com%2FsRDXLqN.png)
API to send BossBar Titles / Messages




### BossBarAPI

```php
// First you"ll need this
use PocketEssential\BossBarAPI\BossBarAPI;

// You can also do:

$BossBarAPI = BossBarAPI::getInstance();
```

#### Sending  BossBars to players

```php

// Set the barMessage first!

$message = "This is a BossBar message";

$BossBarAPI->setBarMessage($message);

/*
 Player should an instance of a PLAYER, Just foreach loop all the online players; etc
 */

$BossBarAPI->sendBossBar($player);


  }
```

# Example

![Example](https://camo.githubusercontent.com/3f1baf23d487ffec2fbc0215568fef25c018bca7/68747470733a2f2f70726f78792e737069676f746d632e6f72672f373162373437383565373263383362613432346135613131633838303231383238663762643731363f75726c3d68747470732533412532462532467062732e7477696d672e636f6d2532466d656469612532464363382d664c50574941416462664e2e6a70672533416c61726765)


# Info

        You can also try a simple plugin made by us
        Using our API, You can get (take a look at
        it over) [here](https://github.com/PocketEssential/BossBar)
