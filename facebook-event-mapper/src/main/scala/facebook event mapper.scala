package org.apache.spark.examples.sql

import org.apache.spark.SparkContext
import org.apache.spark.SparkContext._
import org.apache.spark.SparkConf

import org.apache.spark.sql.catalyst.encoders.ExpressionEncoder
import org.apache.spark.sql.Encoder
import org.apache.spark.sql.Row
import org.apache.spark.sql.SparkSession
import org.apache.spark.sql.types._

object Facebook_Event_Mapper {
	def main(args: Array[String]) {

	val jsonpath = args(0)

	val spark = SparkSession
      .builder()
      .appName("Facebook Event Mapper")
      .config("spark.some.config.option", "some-value")
      .getOrCreate()

import spark.implicits._

	val events = spark.read.json(jsonpath+"results.json")

	val latlong = events.select($"place.location.latitude",$"place.location.longitude")

	val latlongfiltered = latlong.filter($"latitude" === 0 or $"latitude" > 0 or $"latitude" < 0)

	latlongfiltered.write.mode("overwrite").json(jsonpath+"latlong.json")

	spark.stop()
  }
}
