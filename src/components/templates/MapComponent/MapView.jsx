// src/MapView.js
import React from 'react';
import { MapContainer, TileLayer, GeoJSON } from 'react-leaflet';
import 'leaflet/dist/leaflet.css';
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
  };// Ensure this path is correct

function MapView() {
  const onEachDistrict = (feature, layer) => {
    layer.on({
      click: () => {
        layer.bindPopup(
          `<strong>${feature.properties.name}</strong>`
        ).openPopup();
      }
    });
    layer.setStyle({
      fillColor: "#478e51",
      weight: 2,
      opacity: 1,
      color: "white",
      fillOpacity: 0.6
    });
  };

  return (
    <MapContainer center={[30.3753, 69.3451]} zoom={5} style={{ height: '100vh', width: '100%' }}>
      <TileLayer
        attribution='&copy; OpenStreetMap contributors'
        url="https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png"
      />
      <GeoJSON data={pakistanDistricts} onEachFeature={onEachDistrict} />
    </MapContainer>
  );
}

export default MapView;
