import React from "react";
import { useNavigate } from "react-router-dom";

const Card = () => {
  const navigate = useNavigate();

  const CardItem = ({ title, description, bgColor, icon, navigateTo }) => {
    return (
      <div
        onClick={() => navigate(navigateTo)}
        className={`relative overflow-hidden ${bgColor} text-white flex items-center justify-center p-20 transform transition-transform hover:scale-105 cursor-pointer`}
      >
        <div className="absolute top-0 left-0 w-1/2 h-full bg-black opacity-10 transform -skew-x-12"></div>
        <div className="absolute top-4 left-4 text-4xl opacity-30">{icon}</div>
        <div className="relative text-center">
          <h2 className="text-2xl font-bold mb-2">{title}</h2>
          <p className="text-sm italic">{description}</p>
        </div>
      </div>
    );
  };

  return (
    <div className="mt-28">
      {[
        {
          title: "TVET Supply",
          description:
            "Explore insights on enrollments, gender, providers, and courses.",
          bgColor: "bg-teal-600",
          icon: "📈",
          navigateTo: "/tvet-supply",
        },
        {
          title: "Employment Projections",
          description:
            "Explore skilled workforce projections region, sector and district wise.",
          bgColor: "bg-purple-600",
          icon: "📊",
          navigateTo: "/employment-projections",
        },
        {
          title: "District Map",
          description:
            "Explore district level insights about TVET supply and demand indicators.",
          bgColor: "bg-indigo-700",
          icon: "🗺️",
          // navigateTo: "/district-map",
        },
        {
          title: "TVET Providers",
          description:
            "Explore information on TVET institutes, companies offering training and programmes.",
          bgColor: "bg-slate-800",
          icon: "🏫",
          navigateTo: "/institutes",
        },
        {
          title: "Growth Sector",
          description:
            "Explore insights on growth sectors for employment and skill development.",
          bgColor: "bg-blue-600",
          icon: "📚",
          // navigateTo: "/growth-sector",
        },
        {
          title: "Employment Trends",
          description:
            "Find trending employment opportunities in local and international job markets.",
          bgColor: "bg-gray-700",
          icon: "💼",
          // navigateTo: "/employment-trends",
        },
      ].map((card, index) => (
        <CardItem
          key={index}
          title={card.title}
          description={card.description}
          bgColor={card.bgColor}
          icon={card.icon}
          navigateTo={card.navigateTo}
        />
      ))}
    </div>
  );
};

export default Card;
