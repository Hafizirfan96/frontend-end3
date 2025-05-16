import { useEffect, useState } from "react";
import { useLocation, NavLink } from "react-router-dom";
import { Bell, ShoppingCart, User, MapPin } from "lucide-react";

const NavItem = ({ to, label }) => {
  return (
    <NavLink
      to={to}
      className={({ isActive }) =>
        `px-4 py-2 rounded-full font-poppins text-[16px] ${
          isActive ? "bg-cs-light text-white" : "text-black"
        }`
      }
    >
      {label}
    </NavLink>
  );
};
export default NavItem;
