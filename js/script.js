Main_gfn_fb = {
    init_facebook_api:function(){
        var access_token = gfn_fb_settings.access_token,
            page_id = gfn_fb_settings.page_id,
            language = gfn_fb_settings.language,
            the_language_line = "",
            fields = "id,name,link,feed{created_time,message,actions,full_picture,from,type,permalink_url,story,likes,shares,comments}";

            if(language != undefined && language != ""){
                the_language_line = "&locale=" + language;
            }

        if(access_token != undefined && page_id != undefined){
            FB.api(
                'https://graph.facebook.com/' + page_id + '?fields=' + fields + '&access_token=' + access_token + the_language_line,
                'GET',
                 {"fields":fields},
                function(response) {

                    if(response.feed.data != undefined){

                        // push facebook page and url as title -------------------->
                        var title = response.name,
                            url = response.link;

                        $(".gfn_fb_the_title").html('<a href="' + url + '" target="_blank">' + title + '</a> no Facebook');
                        // end push facebook page and url as title ---------------->

                        // loop to push posts to stage ---------------------------->
                        var number_of_posts = response.feed.data.length - 1;
                        $(response.feed.data).each(function(i, post) {


                            //setup message
                            var message = "";
                            if(post.message != undefined){
                                message = post.message;
                            }

                            //setup story
                            var story = "";
                            if(post.story != undefined){
                                story = post.story;
                            }

                            //setup likes count
                            var likes_count = 0,
                                likes_text = "Likes";
                            if(post.likes != undefined){
                                likes_count = post.likes.data.length;
                                if(likes_count == 1){
                                    likes_text = "Like";
                                }
                            }

                            //setup comments count
                            var comments_count = 0,
                                comments_text = "Comentários";
                            if(post.comments != undefined){
                                comments_count = post.comments.data.length;
                                if(comments_count == 1){
                                    comments_text= "Comentário";
                                }
                            }

                            //setup shares counts
                            var shares_count = 0,
                                shares_text = "Partilhas";
                            if(post.shares != undefined){
                                shares_count = post.shares.count;
                                if(shares_count == 1){
                                    shares_text = "Partilha";
                                }
                            }

                            //setup picture
                            var picture = "";
                            if(post.full_picture != undefined){
                                picture = '<div class="gfn_fb_feed_picture_wrap"><img src="'+ post.full_picture +'" alt="picture from facebook"></div>';
                            }

                            // setup date
                            var mydate = new Date(post.created_time);
                            var date_str = mydate.toLocaleDateString();
                            var the_date = '';
                            if(date_str != undefined || date_str != "Invalid Date"){
                                the_date = '<small class="gfn_fb_feed_time">'+ date_str  +'</small>';
                            }


                            //the complete string to spit as a post/slide
                            var the_fb_post = ''    +
                                '<div class="gfn_fb_feed_post item">'	+
                                    '<a href="'+ post.permalink_url +'" target="_blank">'   +
                                        '<div class="gfn_fb_post_inner_content">'   +
                                            '<p class="gfn_fb_feed_author"><span class="the_author_name">'+ post.from["name"] +'</p>'  +
                                            the_date    +
                                        '</div>'  +
                                        picture +
                                        '<div class="gfn_fb_post_inner_content">'   +
                                            '<p class="gfn_fb_feed_message">' + message + '</p>'    +
                                            '<p class="gfn_fb_feed_story">'+ story +'</p>'  +
                                        '</div>'  +
                                        '<div class="likes_and_comments_count">'  +
                                            '<span>'+ likes_count +' ' + likes_text + '</span>' +
                                            '<span>'+ comments_count +' ' + comments_text + '</span>' +
                                            '<span>'+ shares_count +' ' + shares_text + '</span>' +
                                        '</div>'    +
                                    '</a>'  +
                                '</div>'    +
                            '';
                            $("#gfn_fb_posts_stage").append(the_fb_post);


                            //trigger owl carousel after all posts are appended
                            if(i == number_of_posts){
                                Main_gfn_fb.init_owl_carousel();
                            }
                        });
                        // end loop to push posts to stage ------------------------>
                    }else{
                        console.log("Facebook api not responding");
                    }

                }
              );
        }
    },
    init_owl_carousel:function(){
        $(".gfn_fb_feed_wrap").addClass("active");
        $('.owl_gfn_fb').owlCarousel({
            loop:true,
            margin:10,
            autoplay:true,
            autoplayHoverPause:true,
            nav:true,
            responsive:{
                0:{
                    items:1,
                    stagePadding: 40
                },
                480:{
                    items:1,
                    stagePadding: 90
                },
                600:{
                    items:1,
                    stagePadding: 150
                },
                975:{
                    items:3
                }
            }
        });
    }
}
var $ = jQuery;
$(document).ready(function(){
    Main_gfn_fb.init_facebook_api();
});
