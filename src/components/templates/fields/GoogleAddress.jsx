import { useRef, useEffect, useState } from "react";
import { GoogleMap, Marker, useJsApiLoader, Autocomplete } from "@react-google-maps/api";
import FormInput from "./FormInput";
import { GOOGLE_MAP_API_KEY } from "../../../config";

const libraries = ["places"];
const mapContainerStyle = { width: "100%", height: "400px" };
//Local
const center = { lat: 31.5203696, lng: 74.35874729999999 };
//Production
// const center = { lat: 43.718371, lng: -79.5428643 }; 

const GoogleAddress = ({ lngName, latName, form, name, title, disabled = false }) => {

    const autocompleteRef = useRef(null);

    const [mapCenter, setMapCenter] = useState({
        lat: parseFloat(form.watch(latName)) || center.lat,
        lng: parseFloat(form.watch(lngName)) || center.lng,
    });

    useEffect(() => {
        console.log("form.watch(latName)", form.watch(latName), mapCenter);

        setMapCenter({
            lat: parseFloat(form.watch(latName)) || center.lat,
            lng: parseFloat(form.watch(lngName)) || center.lng,
        });
        // form.setValue(latName, parseFloat(form.watch(latName)) || center.lat)
        // form.setValue(lngName, parseFloat(form.watch(lngName)) || center.lng)
    }, [form.watch(latName), form.watch(lngName)]);





    const { isLoaded } = useJsApiLoader({
        googleMapsApiKey: GOOGLE_MAP_API_KEY,
        libraries,
    });

    const handlePlaceSelect = () => {
        const place = autocompleteRef.current.getPlace();
        if (place.geometry) {
            const lat = place.geometry.location.lat();
            const lng = place.geometry.location.lng();

            form.setValue(latName, lat)
            form.setValue(lngName, lng)
            form.setValue(name, place.formatted_address)
            setMapCenter({ lat, lng })
        }
    };

    const handleSearch = async () => {

        if (!form.watch(name)) return;

        const response = await fetch(
            `https://maps.googleapis.com/maps/api/geocode/json?address=${encodeURIComponent(form.watch(name))}&key=${GOOGLE_MAP_API_KEY}`
        );
        const data = await response.json();

        if (data.status === "OK") {
            const lat = data.results[0].geometry.location.lat;
            const lng = data.results[0].geometry.location.lng;
            form.setValue(latName, lat)
            form.setValue(lngName, lng)

        }
    };

    const handleKeyPress = (event) => {
        if (event.key === "Enter") {
            event.preventDefault();
            handleSearch();
        }
    };

    const handleMapClick = (event) => {

        form.setValue(latName, event.latLng.lat())
        form.setValue(lngName, event.latLng.lng())

    };

    if (!isLoaded) return <p>Loading Maps...</p>;

    return (
        <>
            <Autocomplete
                onLoad={(autocomplete) => (autocompleteRef.current = autocomplete)}
                onPlaceChanged={handlePlaceSelect}
            >
                <FormInput
                    form={form}
                    name={name}
                    disabled={disabled}
                    title={title}
                    onKeyDown={handleKeyPress}

                />
            </Autocomplete>

            <div className="col-span-1 md:col-span-2 lg:col-span-3">

                <GoogleMap
                    mapContainerStyle={mapContainerStyle}
                    zoom={14}
                    center={mapCenter}
                    onClick={handleMapClick}

                >
                    <Marker position={mapCenter} />
                </GoogleMap>
            </div>


        </>
    );
};

export default GoogleAddress;
