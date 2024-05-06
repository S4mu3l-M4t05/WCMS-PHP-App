<?php
class PortfolioManager extends DbConnect {
    public function getPortfolioItems() {
        // Retrieve all portfolio items from the database and return them as an array
        $query = $this->db->query('SELECT * FROM portfolio');
        $result = $query->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }
    public function getPortfolioItemById($id) {
        // Retrieve a specific portfolio item from the database by its ID
        $query = "SELECT * FROM portfolio WHERE id = :id";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        $portfolioItemData = $stmt->fetch(PDO::FETCH_ASSOC);

        return $portfolioItemData;
    }

    public function updatePortfolioItem(Portfolio $portfolio) {
        $portfolioId = $portfolio->getId();
        $header = $portfolio->getSectionTitle();
        $subheader = $portfolio->getSectionSubheader();
        $newImages = $portfolio->getImg();

    // Fetch existing images from the database
        $existingPortfolioItem = $this->getPortfolioItemById($portfolioId);
        $existingImages = json_decode($existingPortfolioItem['images'], true) ?? [];

    // Use new images if provided, otherwise keep existing images
        $finalImages = !empty($newImages) ? $newImages : $existingImages;

        $query = "UPDATE portfolio SET ";
        $setClauses = [];

        if (!empty($header)) {
            $setClauses[] = "header = :header";
        }
        if (!empty($subheader)) {
            $setClauses[] = "subheader = :subheader";
        }
        if (!empty($finalImages)) {
            $setClauses[] = "images = :images";
        }

        if (!empty($setClauses)) {
            $query .= implode(', ', $setClauses) . " WHERE id = :id";
            $stmt = $this->db->prepare($query);

            if (!empty($header)) {
                $stmt->bindParam(':header', $header);
            }
            if (!empty($subheader)) {
                $stmt->bindParam(':subheader', $subheader);
            }
            if (!empty($finalImages)) {
                $stmt->bindParam(':images', json_encode($finalImages));
            }

            $stmt->bindParam(':id', $portfolioId);
            $result = $stmt->execute();

            return $result;
        }
    }


}
