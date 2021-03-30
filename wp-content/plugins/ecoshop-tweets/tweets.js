/****** Twitter Feed ******/
jQuery(document).ready(function(){
    /* Twitter integration */
    var siteURL = jQuery('body').attr('data-home-url');
    jQuery.getJSON(siteURL+'/wp-content/plugins/ecoshop-tweets/tweets.php',
        function(feeds) {
            // alert(feeds);
            var displaylimit		= 10;
            var showdirecttweets	= false;
            var showretweets		= true;
            var feedHTML			= '';
            var displayCounter		= 1;
            var followers_count = true;

            if(feeds !== null) {
                //jQuery("#tweet-slide").hide();

                for (var i=0; i<feeds.length; i++) {
                    var tweetscreenname	= feeds[i].user.name;
                    var tweetusername	= feeds[i].user.screen_name;
                    var profileimage	= feeds[i].user.profile_image_url_https;
                    var status			= feeds[i].text;
                    var isaretweet		= false;
                    var isdirect		= false;
                    var tweetid			= feeds[i].id_str;
                    var followers_count = feeds[i].user.followers_count;

                    // If the tweet has been retweeted, get the profile pic of the tweeter
                    if (typeof feeds[i].retweeted_status !== 'undefined') {
                        profileimage	= feeds[i].retweeted_status.user.profile_image_url_https;
                        tweetscreenname	= feeds[i].retweeted_status.user.name;
                        tweetusername	= feeds[i].retweeted_status.user.screen_name;
                        tweetid			= feeds[i].retweeted_status.id_str;
                        isaretweet		= true;
                    }

                    // Check to see if the tweet is a direct message
                    if (feeds[i].text.substr(0,1) === '@') {
                        isdirect = true;
                    }

                    // console.log(feeds[i]);

                    if (((showretweets === true) || ((isaretweet === false) && (showretweets === false))) && ((showdirecttweets === true) || ((showdirecttweets === false) && (isdirect === false)))) {
                        if ((feeds[i].text.length > 1) && (displayCounter <= displaylimit)) {

                            if (displayCounter === 1) {
                                feedHTML +='<p>'+ JQTWEET.ify.clean(status.substr(0,150)) +'</p>';
                                feedHTML +='<span><span class="primary-color">@'+ tweetscreenname +'</span> '+JQTWEET.timeAgo(feeds[i].created_at)+'</span>';
                            }
                            displayCounter++;
                        }
                    }
                }
                jQuery('#tweet-holder').html(feedHTML);
            }
        }
    );
    var JQTWEET = { // Twitter data format function
        timeAgo: function(dateString) { // twitter date string format function
            var rightNow = new Date();
            var then = new Date(dateString);

            //if (jQuery.browser.msie) {
            // IE can't parse these crazy Ruby dates
            //then = Date.parse(dateString.replace(/( \+)/, ' UTCjQuery1'));
            //}
            var diff = rightNow - then;
            var second = 1000,
                minute = second * 60,
                hour = minute * 60,
                day = hour * 24;
            if (isNaN(diff) || diff < 0) { return ""; }
            if (diff < second * 2) { return "right now"; }
            if (diff < minute) { return Math.floor(diff / second) + " seconds ago"; }
            if (diff < minute * 2) { return "1 minute ago"; }
            if (diff < hour) { return Math.floor(diff / minute) + " minutes ago"; }
            if (diff < hour * 2) { return "1 hour ago"; }
            if (diff < day) { return  Math.floor(diff / hour) + " hours ago"; }
            if (diff > day && diff < day * 2) { return "1 day ago"; }
            if (diff < day * 365) { return Math.floor(diff / day) + " days ago"; }
            else { return "over a year ago"; }
        }, // timeAgo()

        ify: {
            link: function(tweet) { // twitter link string replace function
                return tweet.replace(/\b(((https*\:\/\/)|www\.)[^\"\']+?)(([!?,.\)]+)?(\s|jQuery))/g, function(link, m1, m2, m3, m4) {
                    var http = m2.match(/w/) ? 'http://' : '';
                    return '<a class="twtr-hyperlink" target="_blank" href="' + http + m1 + '">' + ((m1.length > 25) ? m1.substr(0, 24) + '...' : m1) + '</a>' + m4;
                });
            },

            at: function(tweet) { // twitter at (@) character format function
                return tweet.replace(/\B[@?]([a-zA-Z0-9_]{1,20})/g, function(m, username) {
                    return '<a target="_blank" class="twtr-atreply" href="http://twitter.com/intent/user?screen_name=' + username + '">@' + username + '</a>';
                });
            },

            list: function(tweet) { // twitter list string format function
                return tweet.replace(/\B[@?]([a-zA-Z0-9_]{1,20}\/\w+)/g, function(m, userlist) {
                    return '<a target="_blank" class="twtr-atreply" href="http://twitter.com/' + userlist + '">@' + userlist + '</a>';
                });
            },

            hash: function(tweet) { // twitter hash (#) string format function
                return tweet.replace(/(^|\s+)#(\w+)/gi, function(m, before, hash) {
                    return before + '<a target="_blank" class="twtr-hashtag" href="http://twitter.com/search?q=%23' + hash + '">#' + hash + '</a>';
                });
            },

            clean: function(tweet) { // twitter clean all string format function
                return this.hash(this.at(this.list(this.link(tweet))));
            }
        } // ify
    };
    /* End twitter integration */
});