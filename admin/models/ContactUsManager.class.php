<?php
class ContactUsManager extends DbConnect {
    public function getContactUsInfo() {
        // Retrieve contact us information from the database and return as an array
        $query = $this->db->query('SELECT * FROM contact_us');
        $result = $query->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }
    public function getContactUsById($id) {
        $query = "SELECT * FROM contact_us WHERE id = :id";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        $contactUsData = $stmt->fetch(PDO::FETCH_ASSOC);
        return $contactUsData;
    }

    public function updateContactUsInfo(ContactUs $contactUs) {
        $header = $contactUs->getHeader();
        $subheader = $contactUs->getSubheader();
        $map = $contactUs->getMap();

        $query = "UPDATE contact_us SET ";
        $setClauses = [];

        if (!empty($header)) {
            $setClauses[] = "heading = :heading";
        }
        if (!empty($subheader)) {
            $setClauses[] = "subheading = :subheading";
        }
        if (!empty($map)) {
            $setClauses[] = "map = :map";
        }

        if (!empty($setClauses)) {
            $query .= implode(', ', $setClauses);
            $stmt = $this->db->prepare($query);

            if (!empty($header)) {
                $stmt->bindParam(':heading', $header);
            }
            if (!empty($subheader)) {
                $stmt->bindParam(':subheading', $subheader);
            }
            if (!empty($map)) {
                $stmt->bindParam(':map', $map);
            }

            $result = $stmt->execute();

            return $result;
        }
    }
}
