import React, { useEffect } from 'react';
import { Root, Color, Label, RoundedRectangle, HeatLegend } from '@amcharts/amcharts5';
import { MapChart, MapPolygonSeries, geoMercator } from '@amcharts/amcharts5/map';
import * as am5geodata_data_countries2 from "@amcharts/amcharts5-geodata/data/countries2";
import am5themes_Animated from "@amcharts/amcharts5/themes/Animated";
import { JSONParser, net } from '@amcharts/amcharts5';
import '@amcharts/amcharts5/themes/Animated';
import '@amcharts/amcharts5/map';

const MapComponent = () => {
  useEffect(() => {
    const root = Root.new("chartdiv");
    root.setThemes([am5themes_Animated.new(root)]);

    const chart = root.container.children.push(MapChart.new(root, {
      panX: "rotateX",
      projection: geoMercator(),
      layout: root.horizontalLayout
    }));

    const polygonSeries = chart.series.push(MapPolygonSeries.new(root, {
      calculateAggregates: true,
      valueField: "value"
    }));

    const heatLegend = chart.children.push(HeatLegend.new(root, {
      orientation: "vertical",
      startColor: Color.fromHex(0x8ab7ff),
      endColor: Color.fromHex(0x25529a),
      startText: "Lowest",
      endText: "Highest",
      stepCount: 5
    }));

    heatLegend.startLabel.setAll({
      fontSize: 12,
      fill: heatLegend.get("startColor")
    });

    heatLegend.endLabel.setAll({
      fontSize: 12,
      fill: heatLegend.get("endColor")
    });

    polygonSeries.events.on("datavalidated", function () {
      heatLegend.set("startValue", polygonSeries.getPrivate("valueLow"));
      heatLegend.set("endValue", polygonSeries.getPrivate("valueHigh"));
    });

    loadGeodata("PK"); // Default country

    function loadGeodata(country) {
      let currentMap = "usaLow";
      let title = "United States";

      if (am5geodata_data_countries2[country]) {
        currentMap = am5geodata_data_countries2[country]["maps"][0];
        if (am5geodata_data_countries2[country]["country"]) {
          title = am5geodata_data_countries2[country]["country"];
        }
      }

      net.load(`https://cdn.amcharts.com/lib/5/geodata/json/${currentMap}.json`, chart).then((result) => {
        const geodata = JSONParser.parse(result.response);
        const data = geodata.features.map((feature) => ({
          id: feature.id,
          value: Math.round(Math.random() * 10000)
        }));

        polygonSeries.set("geoJSON", geodata);
        polygonSeries.data.setAll(data);
      });

      chart.seriesContainer.children.push(Label.new(root, {
        x: 5,
        y: 5,
        text: title,
        background: RoundedRectangle.new(root, {
          fill: Color.fromHex(0xffffff),
          fillOpacity: 0.2
        })
      }));

      polygonSeries.mapPolygons.template.setAll({
        tooltipText: "{name}",
        interactive: true
      });

      polygonSeries.mapPolygons.template.states.create("hover", {
        fill: Color.fromHex(0x677935)
      });

      polygonSeries.set("heatRules", [{
        target: polygonSeries.mapPolygons.template,
        dataField: "value",
        min: Color.fromHex(0x8ab7ff),
        max: Color.fromHex(0x25529a),
        key: "fill"
      }]);

      polygonSeries.mapPolygons.template.events.on("pointerover", function (ev) {
        heatLegend.showValue(ev.target.dataItem.get("value"));
      });
    }

    return () => {
      root.dispose();
    };
  }, []);

  return <div id="chartdiv" style={{ width: '90%', height: '500px' }}></div>;
};

export default MapComponent;
