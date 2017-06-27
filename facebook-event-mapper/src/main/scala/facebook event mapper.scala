package org.apache.spark.examples.sql

import org.apache.spark.SparkContext
import org.apache.spark.SparkContext._
import org.apache.spark.SparkConf
import org.apache.spark.sql.catalyst.encoders.ExpressionEncoder
import org.apache.spark.sql.Encoder
import org.apache.spark.sql.Row
import org.apache.spark.sql.SparkSession
import org.apache.spark.sql.types._
import org.apache.spark.sql.functions._
import org.apache.spark.sql.functions

object Facebook_Event_Mapper {

	def main(args: Array[String]) {
	//define the paths vars//
	val mainpath = args(0)
	val jsonpath = mainpath + "json/"
	val dbpath   = jsonpath + "db/last/"
	val csvpath  = mainpath + "csv/"
	val resultspath = jsonpath + "results/"
	val filepath = dbpath+args(1)+".json"

	val spark = SparkSession
      .builder()
      .appName("Facebook Event Mapper")
      .config("spark.some.config.option", "some-value")
      .getOrCreate()

import spark.implicits._

	val events = spark.read.json(filepath)

	//val bairros = spark.read.option("header","true").option("charset","iso-8859-1").csv(csvpath+"bairros_rj.csv")

	val eventsrj = events.filter(($"place.location.state" === "RJ") or ($"place.location.city" === "Rio de Janeiro")).distinct

	val latlong = eventsrj.select($"place.location.latitude",$"place.location.longitude")

	//val latlongfiltered = latlong.filter($"latitude" === 0 or $"latitude" > 0 or $"latitude" < 0)

	val latlongfiltered = latlong.filter(!isnull($"latitude") and !isnull($"longitude"))

	latlongfiltered.write.mode("overwrite").json(resultspath+args(1))
	//val returned = latlongfiltered
	spark.stop()
  }
}