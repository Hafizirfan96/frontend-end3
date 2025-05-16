import { CURRENT_USER_STORAGE_KEY } from "@/config"
import { Navigate, Outlet } from "react-router-dom"

const PublicLayer = () => {
  const user = localStorage.getItem(CURRENT_USER_STORAGE_KEY)
  // console.log("user----",user)

  return (
    user?<Navigate to={"/main-menu"} />:<Outlet/>
    // <Navigate to={"/"} />
  )
}

export default PublicLayer