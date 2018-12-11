After installing you'll see a new menu item name "Menu" in your control panel. I love the name Big Kahuna, but it's not something you want to explain to customers every time ;-)

## The cp
You can create as many menus as you like in the cp.

## Usage
After creating a menu, add this tag to your front-end to add it to your site. The name corresponds to the name of a menu in the cp:

    {{ bigkahuna menu="custom-name" }}

Which will return something like this:

    <ul class="nav custom-name">
        <li class="nav__item is--active">
            <a href="URL" title="Title">
                Title
                <ul classs="submenu">
                    <li class="submenu__item">
                        <a href="URL" title="Title">
                            Title
                        </a>
                        Ad infinitum
                    </li>
                </ul>
            </a>
        </li>
    </ul>

_As you can see the name is added as a class so you can target the right menu more easily in css._

## Parameters
You can change the defaults with the following parameters:

### Main list
**menu** _Required_  
This is the slug of a menu you created in the cp.

**id**  
The id for the root ul. If you don't provide one there won't be an id.

**class**  
The class for the root ul. Defaults to 'nav'.

**active\_class**  
The class for feedback for the current page. Defaults to 'is--active'. This class is applied as an extra class to the li for root items and submenu items..

**item\_class**  
The class for every root li. Defaults to 'nav__item'.

### A submenu list
**submenu\_class**  
The class for every ul element inside a list item following a link. The default is 'submenu'.

**submenu\_item\_class**  
The class for every li element in a submenu. The default is 'submenu__item'.

### Stuff not on the menu
* Custom links to external sites get a `rel="external"` on the link tag.
* Since the 'is--active' class is added to an li, it's best to use something like `.is--active > a` in your stylesheet for feedback classes. That way the submenu links don't inherit the active style.
