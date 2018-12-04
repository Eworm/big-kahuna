After installing you'll see a new menu item name "Big Kahuna" in your control panel.

## Usage
Add this tag to your front-end to add the menu to your site:

    {{ bigkahuna:index }}

Which will return something like this:

    <ul class="nav">
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

## Parameters
You can change the defaults with the following parameters:

### Main list
**id**  
The id for the root ul. If you don't provide one there won't be an id;

**class**  
The class for the root ul. Defaults to 'nav';

**active\_class**  
The class for feedback for the current page. Defaults to 'is--active'. This class is applied as an extra class to the li for root items and submenu items.;

**item\_class**  
The class for every root li. Defaults to 'nav__item';

### A submenu list
**submenu\_class**  
The class for every ul element inside a list item following a link. The default is 'submenu';

**submenu\_item\_class**  
The class for every li element in a submenu. The default is 'submenu__item';

### Stuff not on the menu
* Custom links to external sites get a `rel="external"` on the link tag.
* Since the 'is--active' class is added to an li, it's best to use something like `.is--active > a` in your stylesheet for feedback classes. That way the submenu links don't inherit the active style.
