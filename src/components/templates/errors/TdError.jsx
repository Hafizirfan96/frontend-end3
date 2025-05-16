import Td from "../Table/Td"
import Tr from "../Table/Tr"

const TdError = () => {
  return (
    <Tr>
    <Td colSpan="100" className="text-center">
      No data found
    </Td>
  </Tr>
  )
}

export default TdError