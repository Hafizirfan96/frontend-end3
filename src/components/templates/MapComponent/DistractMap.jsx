// DistrictMap.js
import React from "react";
import { MapContainer, TileLayer, GeoJSON, Popup } from "react-leaflet";
import "leaflet/dist/leaflet.css";
const pakistanDistricts = {
    type: "FeatureCollection",
    features: [
      {
        type: "Feature",
        properties: { name: "Islamabad" },
        geometry: {
          type: "Polygon",
          coordinates: [[[73.0479, 33.6844], [73.1, 33.7], [73.08, 33.74], [73.0479, 33.6844]]],
        },
      },
    ],
  };

const DistrictMap = () => {
  const onEachDistrict = (feature, layer) => {
    const name = feature.properties.name;
    layer.bindPopup(`<strong>District:</strong> ${name}`);
  };

  return (
    <div className="w-full h-screen">
      <MapContainer center={[30.3753, 69.3451]} zoom={5} style={{ height: "100%", width: "100%" }}>
        <TileLayer
          url="https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png"
          attribution='&copy; <a href="http://osm.org/copyright">OpenStreetMap</a> contributors'
        />
        <GeoJSON
          data={pakistanDistricts}
          style={() => ({
            color: "#3388ff",
            weight: 2,
            fillColor: "#6baed6",
            fillOpacity: 0.5,
          })}
          onEachFeature={onEachDistrict}
        />
      </MapContainer>
    </div>
  );
};

export default DistrictMap;
