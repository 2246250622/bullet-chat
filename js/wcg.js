HTMLElement.prototype.wcg = function (settings={
    "words": ["Hi!", "Hallo!", "Holla!", "Γεία!", "Bonjour!"],
    "min_speed": 1,
    "max_speed": 3
}) {

    // initializing wcg container
    var wcg_container = this;

    /* Setting settings default values */
    settings.min_speed = typeof settings.min_speed !== 'undefined' ? settings.min_speed : 2.97;
    settings.max_speed = typeof settings.max_speed !== 'undefined' ? settings.max_speed : 3;
    settings.font_size = 15;
    settings.word_buffer = 5;
    settings.words_on_screen = Math.floor((wcg_container.clientHeight - 17) / (settings.font_size + settings.word_buffer));

    // setting min speed
    if (settings.min_speed < 1) {
        settings.min_speed = 1;
        console.log("wcg min_speed must be greater than or equol 1.");
    }


    // setting default element-css
    wcg_container.style = "position:relative;overflow:hidden;";

    var tops = [15 - (settings.font_size + settings.word_buffer), (wcg_container.clientHeight - 17 - (settings.font_size + settings.word_buffer))];
    var regions = getRegions(15, wcg_container.clientHeight - 17, tops);
    var i = 0;

    /**
     * Section to create words and append it to wcg container
     */
    while (regions.length > 0) {
        console.log(regions)
        // create word element
        let word_container = document.createElement("span");

        // setting id and html
        word_container.innerHTML = settings.words[i];
        word_container.id = "wcg_element";

        // initializing starting top, speed and left
        let top = getRandomNumberForTops(15, wcg_container.clientHeight - 17, regions, tops);
        let left = getRandomNumber(-100, wcg_container.clientWidth, true);
        let speed = getRandomNumber(settings.min_speed, settings.max_speed);

        // setting speed
        word_container.setAttribute("speed", speed);

        // setting default style
        word_container.style = "position:absolute;top:" + top + "px;display:inline-block;max-width:2000px;white-space:nowrap;font-size:" + settings.font_size + "px;";

        // setting start left position
        word_container.style.left = left + "px";


        // appending word element to wcg container
        wcg_container.appendChild(word_container);

        //Generate new regions
        regions = getRegions(15, wcg_container.clientHeight - 17, tops);
        i++;
    }

    console.log(tops);

    /**
     * Clock to update position of words
     */
    setInterval(function () {


        // getting wcg container children
        let word_nodes = wcg_container.children;


        // looping wcg container children
        for (i = word_nodes.length - 1; i >= 0; i--) {


            // setting current node for each wcg container children
            let current_node = word_nodes[i];

            // cleft for correct left position of current node
            let cleft = parseInt(current_node.style.left, 10);

            // getting current node starting speed from attribute
            let speed = current_node.getAttribute("speed");

            // updating left position of current node
            cleft -= speed;

            // if current node is offscreen go to end and change string
            if (cleft < -current_node.clientWidth) {
                cleft = wcg_container.clientWidth;
                current_node.innerText = getNewString();
            }

            // updating left position of current node
            current_node.style.left = cleft + "px";

        }


    }, 50);


    /**
     * Function for random numbers
     */
    function getRandomNumber(min, max, int = false) {
        if (int) {
            return Math.floor(Math.random() * (max - min + 1)) + min;
        } else {
            return Math.random() * (max - min) + min;
        }
    }

    /**
     * Function for random tops
     */
    function getRandomNumberForTops(min, max, regions, existingTops) {
        let top_region_index = Math.floor(Math.random() * Math.floor(regions.length - 1));
        let top_value_index = Math.floor(Math.random() * Math.floor(regions[top_region_index].length - 1));
        let top_value = regions[top_region_index][top_value_index];
        existingTops.push(top_value);
        return top_value;
    }

    /**
     * Function to get top regions in which strings can be displayed
     */
    function getRegions(min, max, existingTops) {
        //Descending list
        existingTops = existingTops.sort(function (a, b) {
            return a - b
        });

        if (existingTops.length == 0) {
            let all_regions = [];
            for (let i = min; i <= max + (settings.font_size + settings.word_buffer); i++) {
                all_regions.push(i);
            }
            return [all_regions];
        }

        regions = [];
        for (let i = 0; i <= existingTops.length - 2; i++) {
            let current_top = existingTops[i];
            let next_top = existingTops[i + 1];

            let space = Math.abs(next_top) - Math.abs(current_top);
            if (space < (settings.font_size + settings.word_buffer)) {
                continue;
            }
            let new_region = []
            for (let j = current_top + (settings.font_size + settings.word_buffer); j <= next_top - (settings.font_size + settings.word_buffer); j++) {
                new_region.push(j);
            }

            if (new_region.length > 0) {
                regions.push(new_region);
            }
        }
        return regions;
    }

    /**
     * Function to get new string to display
     */
    function getNewString() {
        let word_nodes = wcg_container.children;
        let strings_on_screen = [];
        for (i = 0; i <= word_nodes.length - 1; i++) {
            strings_on_screen.push(word_nodes[i].innerText);
        }
        var string;

        while (true) {
            let new_string_index = Math.floor(Math.random() * Math.floor(settings.words.length - 1));
            string = settings.words[new_string_index]
            if (strings_on_screen.indexOf(string) == -1) {
                break;
            }
        }
        return string;
    }

};


