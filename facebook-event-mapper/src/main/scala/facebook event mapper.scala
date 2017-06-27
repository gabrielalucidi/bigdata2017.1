package org.apache.spark.examples.sql

import org.apache.spark.SparkContext
import org.apache.spark.SparkContext._
import org.apache.spark.SparkConf
import org.apache.spark.sql.SQLContext

import org.apache.spark.sql.catalyst.encoders.ExpressionEncoder
import org.apache.spark.sql.Encoder
import org.apache.spark.sql.Row
import org.apache.spark.sql.SparkSession
import org.apache.spark.sql.types._
import org.apache.spark.sql.expressions._
import org.apache.spark.sql.expressions
import org.apache.spark.sql.functions
import org.apache.spark.sql.functions._
import org.apache.spark.sql._
import org.apache.spark.sql
import scala.math._
import scala.math
import scala.collection.mutable.ListBuffer

object Facebook_Event_Mapper {
	def main(args: Array[String]) {
	
	//define the paths vars//
	val mainpath = args(0)
	val jsonpath = mainpath + "json/"
	val dbpath   = jsonpath + "db/last"
	val csvpath  = mainpath + "csv/"
	val resultspath = jsonpath + "results/"
	
	val spark = SparkSession
      .builder()
      .appName("Facebook Event Mapper")
      .config("spark.some.config.option", "some-value")
      .getOrCreate()

import spark.implicits._

	val bairrostemp = spark.read.option("header","true").option("charset","iso-8859-1").csv(csvpath+"bairros_rj.csv")

	val bairros = bairrostemp.selectExpr("Bairro",
     "cast (Latitude as Double) Latitude",
     "cast (Longitude as Double) Longitude")

	val events = spark.read.json(dbpath+"*.json")

	val eventsrj = events.filter(($"place.location.state" === "RJ") or ($"place.location.city" === "Rio de Janeiro")).distinct
	
	val latlongtemp = eventsrj.select($"place.location.latitude",$"place.location.longitude")

	val latlong = latlongtemp.filter(!isnull($"latitude") and !isnull($"longitude"))

	val latlongarray = latlong.map(r => Array (r(0).asInstanceOf[Double],r(1).asInstanceOf[Double])).collect()

	//latlongfiltered.write.mode("overwrite").json(resultspath+"latlong.json")

	//val returned = latlongfiltered

	val ao_quadrado : Double => Double = scala.math.pow(_,2)

	val raiz_quadrada : Double => Double = scala.math.sqrt(_)

	val ao_quadrado_UDF = udf(ao_quadrado)

	val raiz_quadrada_UDF = udf(raiz_quadrada)

	val bairros_gerados = gera_bairros(latlongarray).toVector.toDF("Bairro")


	//val events_bairro = eventsrj.

	spark.stop()
}
	def gera_bairros(arg: Array [Array[Double]]) = {
		var bairros_result = new Array [String](eventsrj.count.toInt)
		for( i <- 0 to (arg.length.toInt-1)) {
			var bairros_comp = bairros
			var bairros_comp2 = bairros_comp.withColumn("Latitude",$"Latitude"-arg(i)(0)).withColumn("Longitude",$"Longitude"-arg(i)(1)).withColumn("Latitude",ao_quadrado_UDF($"Latitude")).withColumn("Longitude",ao_quadrado_UDF($"Longitude")).withColumn("Distances",($"Latitude" + $"Longitude")).withColumn("Distances",raiz_quadrada_UDF($"Distances")).sort("Distances")
			var bairro_name = bairros_comp2.take(1)(0)(0).toString
			bairros_result(i) = bairro_name
		}
		bairros_result
	}
}

// 	def gera_sequencia(arg1: Array[String], arg2: Array[Array[Double]]) = {
// var result = new ListBuffer[String]()
// for( i <- 0 to (arg1.length.toInt-1)) {
// result += List(arg1(i),arg2(i)(0).toString,arg2(i)(1).toString)
//  }
//  result
//  }
