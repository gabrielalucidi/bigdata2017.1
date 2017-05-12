/**
*version 0.1 for facebook event map
*first thing to do is to get to the right folder
*myself put all the github folder in /home/bigdata/git-repost/
*the JSON result is in home/bigdata/git-repost/bigdata2017.1/json/
*and it's name is results.json
*this version is made for spark-shell
*/

/**create the RDD*/
val results = sc.textFile("results.json")

/**split by event*/
val events = result.flatMap(_.split(""""description":"""))

/**create a funcion to replace all unicode codes for its chars*/
def unescapeUnicode(str: String): String = 
  """\\u([0-9a-fA-F]{4})""".r.replaceAllIn(str, 
    m => Integer.parseInt(m.group(1), 16).toChar.toString)

/**use function in order to have a better view of the events*/
val eventsDecoded = events.map(unescapeUnicode(_))

/**those classes could be used in the future, but, for the events that i saw, they weren't needed*/

/**class cover_photo(cover_id : String, offset_x : Float, offset_y : Float, source : String)*/

/**there's yet more subsclasses in class group : owner -> user/page and parent -> group/page/app*/
/**class group (group_id : String, cover : cover_photo[_], description : String, email : String, icon : String, member_request_count : Int, name : String, privacy : String)*/


/**creating the class to hold the location*/
class location (city : String, city_id : String, county_code : String, latitude : Float, location_id : String, longitude : Float, name : String, region : String, region_id : String, state : String, street : String, zip : String)

/**now we extend the class location to class place*/
class place (place_id : String, location : location, name : String, overall_rating : Float)


class setime(date: String, time : String, timezone_type : Int, timezone : String)


/**finaly, we creat the class event to hold all information and also to creat all it's functions*/
/*i'll creat 2 versions, one using group and cover_photo and another without*/

class Event (event_id : String, attending_coung : Int, can_guest_invite : Boolean, can_viewer_post : Boolean, category : String, declined_count : Int, description : String, end_time : setime, guest_list_enabled : Boolean, interested_count : Int, is_canceled : Boolean, is_draft : Boolean, is_page_owned : Boolean, is_viewer_admin : Boolean, maybe_count : Int, name : String, noreply_count : Int, place : place, start_time : setime, ticket_url : String, timezone : Int, event_type : Int)