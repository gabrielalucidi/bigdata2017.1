/**
*version 0.1 for facebook event map
*first thing to do is to get to the right folder
*myself put all the github folder in /home/bigdata/git-repost/
*the JSON result is in home/bigdata/git-repost/bigdata2017.1/json/
*and it's name is results.json
*this version is made for spark-shell
*/

/*create the RDD*/
val results = sc.textFile("results.json")

/*split by event*/
val events = result.flatMap(_.split("\"description\""))

/*create a funcion to replace all unicode codes for its chars*/
def unescapeUnicode(str: String): String = 
  """\\u([0-9a-fA-F]{4})""".r.replaceAllIn(str, 
    m => Integer.parseInt(m.group(1), 16).toChar.toString)

/*use function in order to have a better view of the events*/
val eventsDecoded = events.map(unescapeUnicode(_))

